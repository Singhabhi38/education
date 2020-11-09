<product-partial-view  ng-controller="ExaminationProfileController" ui-view="examinationDetail">

    <h1>Profile</h1>
    <h2 class="mdl-card__title-text">Examination NAME: @{{ examination.name }}</h2>
    <h2 class="mdl-card__title-text">Grade ID: @{{ examination.grade_id }}</h2>
    <h2 class="mdl-card__title-text">Course ID: @{{ examination.course_id }}</h2>
    <h2 class="mdl-card__title-text">Room ID: @{{ examination.room_id }}</h2>


</product-partial-view>