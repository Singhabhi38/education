=========================================================================================
 WinTail is a Windows version of the UNIX 'tail -f' command.
 
 Authors: Alberto Andreo & Luca Maggiolo
 
 Copyright(c)
 
 This is free and unencumbered software released into the public domain.

 Anyone is free to copy, modify, publish, use, compile, sell, or distribute this 
 software, either in source code form or as a compiled binary, for any purpose, 
 commercial or non-commercial, and by any means.

 In jurisdictions that recognize copyright laws, the author or authors of this 
 software dedicate any and all copyright interest in the software to the public domain. 
 We make this dedication for the benefit of the public at large and to the detriment 
 of our heirs and successors. We intend this dedication to be an overt act of 
 relinquishment in perpetuity of all present and future rights to this software under 
 copyright law.

 THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, 
 INCLUDING  BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A 
 PARTICULAR PURPOSE AND  NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS BE LIABLE 
 FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR 
 OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR 
 OTHER DEALINGS IN THE SOFTWARE.

 For more information, please refer to http://unlicense.org/
 
=========================================================================================

This is WinTail 2.2.4.2 portable stable version.
It is recommended always to use stable versions for most users.

WinTail project is in constant development in order to improve it, therefore we encourage 
you to notify us new features, changes and software defects, so that we can implement a 
new version opening a ticket using this link: http://sourceforge.net/p/wintail/tickets/

This is the stable version of WinTail that supports all Windows operating
systems at 32/64 bits because it's based on .NET 4.0

For more information about WinTail project, please visit our web site:
http://www.tailforwindows.org/

---
Zip file includes:
  WinTail-2.2.4.2-portable.exe
  readme.txt
---

Changes since the latest stable version:

WinTail 2.2.4.2 - 2016-01-02
  Added features
  o Improved CheckForUpdates feature that now is based on online XML PAD Version 4.0
  o Code review to make it more robust and stable especially in case of special 
    exceptions reported by users
  o Minor changes and bug fixes

WinTail 2.2.4.0 - 2015-12-10
  Added features
  o (SourceForge ticket #8): WinTail is now capable to open files that are in use by other
    processes avoiding exceptions. (Thanks to M S Cook)
  o User can now switch between tabbed interface (shortcut CTRL+T)
  o Detailed review of the code by re-engineering of the major classes
  o Minor changes and bug fixes

WinTail 2.2.3.1 - 2015-11-15
  Added features
  o (SourceForge ticket #6): Files can be passed to WinTail through the command-line
     in the form 'WinTail.exe "c:\file1.log" "c:\file2.log" ... '.
	 This also allows you to drag and drop your files directly on the application icon.
	 (Thanks to Jim)
  o Improved WinTail logging information (accessible pressing L button from the About form)
  o Other minor changes and general improvements of the program

WinTail 2.2.0.0 - 2015-10-29
  Added features
  o (SourceForge ticket #4): Added new system parameter in the application setting to 
    determine whether should be reopened or not all files that were opened with the
	previous session. (Thanks to Jim)
  o (SourceForge ticket #5): Wintail now accepts command-line arguments. Introduced 
    parameter '--filelist' in order to pass to the program a listing of all the files
	that have to be opened at program startup. Please fill the external plain text file
	entering one file name per line. For more information run WinTail executable
	passing '--help' argument. (Thanks to Jim)
  
WinTail 2.1.1.0 - 2015-10-25
  Added features
  o Added 'Recent Files' feature to reopen automatically at program startup all files
    that were under monitoring the last time the program closed
  o Added feature to arrange automatically all previoulsy opened child windows with 
    the same layout defined by the user at runtime

WinTail 2.1 - 2015-10-08
  Added features
  o Added feature to export all registry settings into an external .reg file
  o Minor changes and bug fixes

WinTail 2.0 - 2015-09-04
  Added features
  o Bugfix: the program hanged if the file that was being monitored was deleted or renamed
  o Changed main application title to show the file size in human readable format of the file 
    that is under monitoring
  o Minor changes and bug fixes

WinTail 1.9 - 2015-08-29
  Added features
  o Added label in the keywords definition form to the checkbox column that 
    enables or disables the selected keywords
  o Added new checkbox in the keywords definition form in order to specify for 
    what keywords should be sent mails

WinTail 1.8 - 2015-08-21
  Added features
  o Bugfix: in the Settings Window the password has been obscured with asterisks
  o Settings Window layout has been improved
  o In the Settings Window the OK button has been renamed in 'Apply' and the code 
    attached to the button has been improved

WinTail 1.7 - 2015-08-20
  Added features
  o Changed main application title to show the basename of the target file 
    name (Thanks to David)
  o Bugfix (SourceForge ticket #3): Added application settings parameter 
    to ignore remote certificate validation when sending mails in SSL 
	authenticated mode (Thanks to Delf)

WinTail 1.6 - 2015-08-19
  Added features
  o Added drag-and-drop feature to open easily one or more than one file, just 
    dragging them to the main application form
  o Added new views of the main form: top half, bottom half, top-middle e bottom third
  o Added new menu 'Highlighting' to define search keywords and styles
  o Added new checkbox 'Follow tail' in the child tail windows
  o Added new checkbox 'Enable highlighting' in the child tail windows
  o Added new checkbox 'Show line markers' in the child tail windows
  o Added new context menu in the child tail windows activated via right mouse 
    click to open the file with the default editor and to open easyly in Explorer the 
	folder that contains the file
  o Improved 'Check for updates' as an asynchronous task

WinTail 1.5 - 2015-07-06
  Added features
  o Added buttons to suspend and resume the tailing process. When the tail process 
    is resumed, will be displayed all changes occurred in the meantime
  o Minor changes

WinTail 1.4 - 2015-07-05
  Added features
  o Added 'Settings' form to allow users to customize the application behaviour and 
    to set the SMTP settings
  o Comprehensive review of the code to improve the whole application behaviour
  o Improved INI file retrieval and parsing thanks to a new custom class
  o The algorithm that performs the tail has been completely rewritten to improve both 
    performance and making the process as more like the UNIX tail command
  o Automatic file preload of the desired number of lines (see Settings form)
  o Matching keywords are now optionally sent to the user via email
  o Added functionality to open in Explorer the folder that contains the files from the 
    history of the last 10 opened files, right clicking the mouse button above the items
  o Added button to load the entire file (at user's risk in case of very huge files :-D)
  o Added application log file very useful for debugging
  o Added shortcut-trick in the 'About' form: pressing the 'L' letter will open the 
    application LOG file :-D
  o Bug fixes

WinTail 1.3 - 2014-09-13
  Added features
  o Fixed: only one instance of the files can be opened at once
  o Improved child windows auto-arrange in the main MDI form
  o Improved GUI
  o Added extra features to hide and show the child windows
  o Added shortcut-trick in the 'About' form: pressing the 'I' letter will open the 
    application INI file :-D
  o Minor bug fixes

WinTail 1.2 - 2014-08-15
  Added features
  o Added text field to search and highlight keywords "grep like"
  o Improved GUI
  o Minor bug fixes

WinTail 1.1 - 2014-08-04
  Added features
	o Introduced application INI file to keep the majour settings and basic configurations
	o Keep the history of the last 10 opened files
    o Close all opened Windows
	o Close all opened Windows except the selected one
	o Minor bug fixes

WinTail 1.0 - 2014-08-03
    o First release of WinTail
