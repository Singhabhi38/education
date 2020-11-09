<?php

namespace App\Http\Middleware;

use App\Log\LogUtil;
use App\Product\Exception\CacheException;
use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

class SimpleGETPOSTCacheMiddleware{
    private $cachePrefix;
    private $LOGGER;

    public function __construct(){
        $this->cachePrefix = Str::slug( Config::get('client.info')['orgName'] );
        //
        $this->LOGGER = LogUtil::getLoggerInstance(SimpleGETPOSTCacheMiddleware::class);
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next){

        try{
            $FullURLWithQuery = $request->path() . '?' .$request->getQueryString();
            $authUserId = '*';

            if($request->isMethod('post')
                || $request->isMethod('put')
                || $request->isMethod('patch')
                || $request->isMethod('delete')
            ){
                $this->LOGGER->info("|___| Flushing cache because of Method ".$request->method()." for Request URL: ".$FullURLWithQuery);
                Cache::flush();
            }else if($request->isMethod('get')){

                $cacheKey = $this->generateCacheKey($FullURLWithQuery,$authUserId);
                if(sizeof($cacheKey) > 200){
                    throw new CacheException("Cache key length is too long for the Request URL: ".$FullURLWithQuery.' .');
                }

                if(Cache::has($cacheKey)){
                    $cacheValue = Cache::get($cacheKey);
                    $this->LOGGER->info("Cache **HIT** for Request GET for URL: ".$FullURLWithQuery." for User ID ".$authUserId.' .');
                    return response()->json(json_decode($cacheValue)->original);
                }else{
                    $this->LOGGER->info("Cache --MISS-- for Request GET for URL: ".$FullURLWithQuery." for User ID ".$authUserId.' .');
                    $response = $next($request);
                    $this->LOGGER->info("|_+_| Adding the response in Cache for URL: ".$FullURLWithQuery." for User ID ".$authUserId." to Cache.");
                    Cache::put($cacheKey, json_encode($response), 30); // for 30 minutes
                    return $response;
                }
            }
        }catch(\Exception $e) {
            Log::error("Error encountered by ".get_class($this).' .');
            Log::error("Stack Trace for the cache error below.");
            Log::error($e->getTraceAsString());
            throw $e;
        }


       // Continue the flow if the value is not in cache or after the cache flush or Exception
       $this->LOGGER->info("|_X_| Skipping cache for Method ".$request->getMethod().' for URL '. $FullURLWithQuery);
       $response = $next($request);
       return $response;
    }

    private function generateCacheKey($FullURLWithQuery,$authUserId ){
        $key = array();
        $key['query'] = $FullURLWithQuery; // TODO Str::slug
//        $key['authUserId'] = $authUserId;
        $cacheKey = base64_encode(json_encode($key));
        $cacheKey = $this->cachePrefix .'_'. $cacheKey;
        return $cacheKey;
    }
}