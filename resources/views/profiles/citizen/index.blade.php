@extends('layouts.profile')

@push('styles')
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<link rel="stylesheet" href="css/bootstrap.css">
<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/css/bootstrap-select.min.css">

<link rel="stylesheet" href="css/citizen-style-default.css">
<link rel="stylesheet" href="css/citizen-style.css">
<link href="css/style-responsive.css" rel="stylesheet">
<link rel="stylesheet" href="css/user-card.css">
<link rel="stylesheet" href="css/to-do.css">
@endpush
@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.11.2/js/bootstrap-select.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCefOgb1ZWqYtj7raVSmN4PL2WkTrc-KyA&sensor=false"></script>
<script src="js/service-requests-widget.js"></script>
@endpush
@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-3 mb">
                <div id='card' class="text-center">
                    <div id="main">
                        <div id="img-wrapper">
                            <img src="https://secure.gravatar.com/avatar/729edf889ced7863dedba95452272bca?d=https://a248.e.akamai.net/assets.github.com%2Fimages%2Fgravatars%2Fgravatar-140.png">
                        </div>
                        <h1>Hugo Giraudel</h1>

                        <div class="btn-group btn-group-sm btn-group-xs">
                            <a type="button" class="btn btn-default ">Settings</a>
                            <button type="button" class="btn btn-default  dropdown-toggle" data-toggle="dropdown">

                                <span class="caret"></span>
                                <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <ul class="dropdown-menu ">
                                <div class="btn btn-default btn-xs btn-block"><a href="#">Dropdown link</a></div>
                                <div class="btn btn-default btn-xs btn-block"><a href="#">Dropdown link</a></div>
                            </ul>
                        </div>
                    </div>
                    <div id="secondary">
                        <ul class="clearfix no-padding">
                            <div class="row " style="margin: auto;">
                                <li><span class="figure">84</span> pens</li>
                                <li><span class="figure">71</span> followers</li>
                            </div>
                            <div class="row " style="margin: auto;">
                                <li><span class="figure">84</span> pens</li>
                                <li><span class="figure">71</span> followers</li>
                            </div>
                            <div class="row " style="margin: auto;">
                                <li><span class="figure">84</span> pens</li>
                                <li><span class="figure">71</span> followers</li>
                            </div>
                        </ul>
                    </div>
                </div>
            </div><!-- /col-md-4 -->
            <div class="col-md-3 text-center  no-padding">
                <section class="task-panel tasks-widget">
                    <div class="panel-heading">
                        <div class="pull-left"><h5><i class="fa fa-tasks"></i> Surveys - <span
                                        class="badge bg-info">8</span></h5></div>
                        <br>
                    </div>
                    <div class="panel-body">
                        <div class="task-content">

                            <ul class="task-list">
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-theme">Done</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-warning">pending</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>
                                <li>

                                    <div class="task-title">
                                        <span class="task-title-sp">دراسة عن العنف ضد المعنفين</span>
                                        <span class="badge bg-important">continue</span>

                                    </div>
                                </li>

                            </ul>
                        </div>

                        <div class=" add-task-row">
                            <a class="btn btn-success btn-sm pull-left" href="todo_list.html#">Add New Tasks</a>
                            <a class="btn btn-default btn-sm pull-right" href="todo_list.html#">See All Tasks</a>
                        </div>
                    </div>
                </section>

            </div>

            <div class="col-md-6">

                <div style="width:100%;height:400px;padding: 0px;margin: 0px;margin-bottom: 16px;"
                     class="form-group col-sm-6">
                    <style>
                        .list-group.panel {
                            background: #7b899c;
                        }

                        .list-group.panel > .list-group-item {
                            border-bottom-right-radius: 4px;
                            border-bottom-left-radius: 4px
                        }

                        .list-group-submenu {
                            width: 90%;
                        }

                        .area-list a {
                            background: #eee;
                        }

                        .city-list a {
                            display: block;
                            background: #fff;
                        }

                        body > div > div:nth-child(1) > div.col-md-6 > div.form-group.col-sm-6 > div.col-sm-3.text-center > div.row > form > div {
                            background: #7b899c;

                        }
                    </style>

                    <div class="col-sm-3 text-center" style="   padding: 0px;   margin: 0px;">

                        <div class=" row" style="margin-bottom:11px;display:inline-block">
                            <form>
                                <select class="selectpicker show-tick show-menu-arrow form-control"
                                        data-style="btn-info">
                                    <optgroup label="Condiments" data-max-options="1">
                                        <option>Mustard</option>
                                        <option>Ketchup</option>
                                        <option>Relish</option>
                                    </optgroup>
                                    <optgroup label="Breads" data-max-options="1">
                                        <option>Plain</option>
                                        <option>Steamed</option>
                                        <option>Toasted</option>
                                    </optgroup>
                                </select>
                                <input type="hidden" id="area_id" name="area_id" value="18">
                                <input type="hidden" id="city_id" name="city_id">
                                <input type="hidden" id="district_id" name="district_id">
                            </form>
                        </div>

                        <div id="MainMenu" style="">

                            <div class="list-group area-list panel">
                                <span class="divider"></span>

                                <a href="#demoArea11" data-id="11" class="list-group-item list-group-item"
                                   data-toggle="collapse" data-parent="#MainMenu">الشمال</a>
                                <div class="collapse list-group-submenu city-list" id="demoArea11">
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity1" data-id="1" class="list-group-item"
                                       data-parent="#demoArea11">بيت
                                        لاهيا </a>
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity2" data-id="2" class="list-group-item"
                                       data-parent="#demoArea11">جباليا </a>


                                </div>


                                <span class="divider"></span>

                                <a href="#demoArea12" data-id="12" class="list-group-item list-group-item"
                                   data-toggle="collapse" data-parent="#MainMenu">غزة</a>
                                <div class="collapse list-group-submenu city-list" id="demoArea12">
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity3" data-id="3" class="list-group-item" data-toggle="collapse"
                                       data-parent="#demoArea12">غزة <i class="fa fa-caret-down"></i></a>

                                    <div class="collapse district-list list-group-submenu" id="SubMenuCity3">
                                        <a href="javascript:void(0)" data-id="1" class="list-group-item"
                                           data-parent="#SubMenuCity3">الزيتون</a>
                                    </div>


                                </div>


                                <span class="divider"></span>

                                <a href="#demoArea13" data-id="13" class="list-group-item list-group-item"
                                   data-toggle="collapse" data-parent="#MainMenu">الوسطى</a>
                                <div class="collapse list-group-submenu city-list" id="demoArea13">
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity4" data-id="4" class="list-group-item"
                                       data-parent="#demoArea13">الزهرة </a>
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity5" data-id="5" class="list-group-item"
                                       data-parent="#demoArea13">النصيرات </a>
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity6" data-id="6" class="list-group-item"
                                       data-parent="#demoArea13">البريج </a>
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity7" data-id="7" class="list-group-item"
                                       data-parent="#demoArea13">دير
                                        البلح </a>


                                </div>


                                <span class="divider"></span>

                                <a href="#demoArea16" data-id="16" class="list-group-item list-group-item"
                                   data-toggle="collapse" data-parent="#MainMenu">رفح</a>
                                <div class="collapse list-group-submenu city-list" id="demoArea16">
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity10" data-id="10" class="list-group-item"
                                       data-parent="#demoArea16">رفح </a>


                                </div>


                                <span class="divider"></span>

                                <a href="#demoArea18" data-id="18" class="list-group-item list-group-item"
                                   data-toggle="collapse" data-parent="#MainMenu">خانيونس</a>
                                <div class="collapse list-group-submenu city-list" id="demoArea18">
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity8" data-id="8" class="list-group-item"
                                       data-parent="#demoArea18">القرارة </a>
                                    <span class="divider"></span>
                                    <a href="#SubMenuCity9" data-id="9" class="list-group-item"
                                       data-parent="#demoArea18">عبسان
                                        الكبيرة </a>


                                </div>


                            </div>

                        </div>

                    </div>


                    <div class="col-md-9" style="min-height: 100px; position: relative; width: 75%; height: 100%;">

                        <div id="map" class="col-lg-8 fh5co-map .gradient"
                             style="padding: 0px; position: relative; overflow: hidden; width: 100%; height: 100%;"></div>
                        <div style="position:absolute;z-index:99;top:0px;left:0px;"></div>
                        <script type="text/javascript">

                            var maps = [];

                            function initialize_0() {
                                var bounds = new google.maps.LatLngBounds();
                                var infowindow = new google.maps.InfoWindow();
                                var position = new google.maps.LatLng(31.3546763, 34.3088255);

                                var mapOptions_0 = {
                                    center: position,
                                    mapTypeId: google.maps.MapTypeId.TERRAIN,
                                    disableDefaultUI: true,
                                    scrollwheel: false,
                                    fullscreenControl: false,
                                };

                                var map_0 = new google.maps.Map(document.getElementById('map'), mapOptions_0);
                                map_0.setTilt(90);

                                var markers = [];
                                var infowindows = [];
                                var shapes = [];

                                var markerPosition_0 = new google.maps.LatLng(31.524569582134685, 34.488039977539074);

                                var marker_0 = new google.maps.Marker({
                                    position: markerPosition_0,


                                    title: "\u0627\u0644\u0634\u0645\u0627\u0644",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_area_11 = marker_0;
                                bounds.extend(marker_0.position);

                                marker_0.setMap(map_0);
                                markers.push(marker_0);


                                var infowindow_0 = new google.maps.InfoWindow({
                                    content: "\u0627\u0644\u0634\u0645\u0627\u0644"
                                });


                                google.maps.event.addListener(marker_0, 'click', function () {
                                    infowindow_0.open(map_0, marker_0);
                                });

                                infowindows.push(infowindow_0);

                                info_area_11 = infowindow_0;


                                var markerPosition_1 = new google.maps.LatLng(31.54914926756507, 34.5058927607422);

                                var marker_1 = new google.maps.Marker({
                                    position: markerPosition_1,


                                    title: "\u0628\u064a\u062a \u0644\u0627\u0647\u064a\u0627",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_1 = marker_1;
                                bounds.extend(marker_1.position);

                                marker_1.setMap(map_0);
                                markers.push(marker_1);


                                var infowindow_1 = new google.maps.InfoWindow({
                                    content: "\u0628\u064a\u062a \u0644\u0627\u0647\u064a\u0627"
                                });


                                google.maps.event.addListener(marker_1, 'click', function () {
                                    infowindow_1.open(map_0, marker_1);
                                });

                                infowindows.push(infowindow_1);

                                info_city_1 = infowindow_1;


                                var markerPosition_2 = new google.maps.LatLng(31.526910783339265, 34.47911358593751);

                                var marker_2 = new google.maps.Marker({
                                    position: markerPosition_2,


                                    title: "\u062c\u0628\u0627\u0644\u064a\u0627",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_2 = marker_2;
                                bounds.extend(marker_2.position);

                                marker_2.setMap(map_0);
                                markers.push(marker_2);


                                var infowindow_2 = new google.maps.InfoWindow({
                                    content: "\u062c\u0628\u0627\u0644\u064a\u0627"
                                });


                                google.maps.event.addListener(marker_2, 'click', function () {
                                    infowindow_2.open(map_0, marker_2);
                                });

                                infowindows.push(infowindow_2);

                                info_city_2 = infowindow_2;


                                var markerPosition_3 = new google.maps.LatLng(31.499983427042807, 34.452334411132824);

                                var marker_3 = new google.maps.Marker({
                                    position: markerPosition_3,


                                    title: "\u063a\u0632\u0629",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_area_12 = marker_3;
                                bounds.extend(marker_3.position);

                                marker_3.setMap(map_0);
                                markers.push(marker_3);


                                var infowindow_3 = new google.maps.InfoWindow({
                                    content: "\u063a\u0632\u0629"
                                });


                                google.maps.event.addListener(marker_3, 'click', function () {
                                    infowindow_3.open(map_0, marker_3);
                                });

                                infowindows.push(infowindow_3);

                                info_area_12 = infowindow_3;


                                var markerPosition_4 = new google.maps.LatLng(31.500568886852182, 34.46538067578126);

                                var marker_4 = new google.maps.Marker({
                                    position: markerPosition_4,


                                    title: "\u063a\u0632\u0629",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_3 = marker_4;
                                bounds.extend(marker_4.position);

                                marker_4.setMap(map_0);
                                markers.push(marker_4);


                                var infowindow_4 = new google.maps.InfoWindow({
                                    content: "\u063a\u0632\u0629"
                                });


                                google.maps.event.addListener(marker_4, 'click', function () {
                                    infowindow_4.open(map_0, marker_4);
                                });

                                infowindows.push(infowindow_4);

                                info_city_3 = infowindow_4;


                                var markerPosition_5 = new google.maps.LatLng(31.49471412379247, 34.455080993164074);

                                var marker_5 = new google.maps.Marker({
                                    position: markerPosition_5,


                                    title: "\u0627\u0644\u0632\u064a\u062a\u0648\u0646",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_district_1 = marker_5;
                                bounds.extend(marker_5.position);

                                marker_5.setMap(map_0);
                                markers.push(marker_5);


                                var infowindow_5 = new google.maps.InfoWindow({
                                    content: "\u0627\u0644\u0632\u064a\u062a\u0648\u0646"
                                });


                                google.maps.event.addListener(marker_5, 'click', function () {
                                    infowindow_5.open(map_0, marker_5);
                                });

                                infowindows.push(infowindow_5);

                                info_district_1 = infowindow_5;


                                var markerPosition_6 = new google.maps.LatLng(31.427943925372475, 34.37886334179689);

                                var marker_6 = new google.maps.Marker({
                                    position: markerPosition_6,


                                    title: "\u0627\u0644\u0648\u0633\u0637\u0649",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_area_13 = marker_6;
                                bounds.extend(marker_6.position);

                                marker_6.setMap(map_0);
                                markers.push(marker_6);


                                var infowindow_6 = new google.maps.InfoWindow({
                                    content: "\u0627\u0644\u0648\u0633\u0637\u0649"
                                });


                                google.maps.event.addListener(marker_6, 'click', function () {
                                    infowindow_6.open(map_0, marker_6);
                                });

                                infowindows.push(infowindow_6);

                                info_area_13 = infowindow_6;


                                var markerPosition_7 = new google.maps.LatLng(31.470705763209253, 34.402895934570324);

                                var marker_7 = new google.maps.Marker({
                                    position: markerPosition_7,


                                    title: "\u0627\u0644\u0632\u0647\u0631\u0629",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_4 = marker_7;
                                bounds.extend(marker_7.position);

                                marker_7.setMap(map_0);
                                markers.push(marker_7);


                                var infowindow_7 = new google.maps.InfoWindow({
                                    content: "\u0627\u0644\u0632\u0647\u0631\u0629"
                                });


                                google.maps.event.addListener(marker_7, 'click', function () {
                                    infowindow_7.open(map_0, marker_7);
                                });

                                infowindows.push(infowindow_7);

                                info_city_4 = infowindow_7;


                                var markerPosition_8 = new google.maps.LatLng(31.44844861207164, 34.3905363154297);

                                var marker_8 = new google.maps.Marker({
                                    position: markerPosition_8,


                                    title: "\u0627\u0644\u0646\u0635\u064a\u0631\u0627\u062a",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_5 = marker_8;
                                bounds.extend(marker_8.position);

                                marker_8.setMap(map_0);
                                markers.push(marker_8);


                                var infowindow_8 = new google.maps.InfoWindow({
                                    content: "\u0627\u0644\u0646\u0635\u064a\u0631\u0627\u062a"
                                });


                                google.maps.event.addListener(marker_8, 'click', function () {
                                    infowindow_8.open(map_0, marker_8);
                                });

                                infowindows.push(infowindow_8);

                                info_city_5 = infowindow_8;


                                var markerPosition_9 = new google.maps.LatLng(31.435560475514176, 34.405642516601574);

                                var marker_9 = new google.maps.Marker({
                                    position: markerPosition_9,


                                    title: "\u0627\u0644\u0628\u0631\u064a\u062c",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_6 = marker_9;
                                bounds.extend(marker_9.position);

                                marker_9.setMap(map_0);
                                markers.push(marker_9);


                                var infowindow_9 = new google.maps.InfoWindow({
                                    content: "\u0627\u0644\u0628\u0631\u064a\u062c"
                                });


                                google.maps.event.addListener(marker_9, 'click', function () {
                                    infowindow_9.open(map_0, marker_9);
                                });

                                infowindows.push(infowindow_9);

                                info_city_6 = infowindow_9;


                                var markerPosition_10 = new google.maps.LatLng(31.4162249477248, 34.35277081250001);

                                var marker_10 = new google.maps.Marker({
                                    position: markerPosition_10,


                                    title: "\u062f\u064a\u0631 \u0627\u0644\u0628\u0644\u062d",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_7 = marker_10;
                                bounds.extend(marker_10.position);

                                marker_10.setMap(map_0);
                                markers.push(marker_10);


                                var infowindow_10 = new google.maps.InfoWindow({
                                    content: "\u062f\u064a\u0631 \u0627\u0644\u0628\u0644\u062d"
                                });


                                google.maps.event.addListener(marker_10, 'click', function () {
                                    infowindow_10.open(map_0, marker_10);
                                });

                                infowindows.push(infowindow_10);

                                info_city_7 = infowindow_10;


                                var markerPosition_11 = new google.maps.LatLng(31.305995029319295, 34.2587003779297);

                                var marker_11 = new google.maps.Marker({
                                    position: markerPosition_11,


                                    title: "\u0631\u0641\u062d",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_area_16 = marker_11;
                                bounds.extend(marker_11.position);

                                marker_11.setMap(map_0);
                                markers.push(marker_11);


                                var infowindow_11 = new google.maps.InfoWindow({
                                    content: "\u0631\u0641\u062d"
                                });


                                google.maps.event.addListener(marker_11, 'click', function () {
                                    infowindow_11.open(map_0, marker_11);
                                });

                                infowindows.push(infowindow_11);

                                info_area_16 = infowindow_11;


                                var markerPosition_12 = new google.maps.LatLng(31.296021060642346, 34.2532072138672);

                                var marker_12 = new google.maps.Marker({
                                    position: markerPosition_12,


                                    title: "\u0631\u0641\u062d",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_10 = marker_12;
                                bounds.extend(marker_12.position);

                                marker_12.setMap(map_0);
                                markers.push(marker_12);


                                var infowindow_12 = new google.maps.InfoWindow({
                                    content: "\u0631\u0641\u062d"
                                });


                                google.maps.event.addListener(marker_12, 'click', function () {
                                    infowindow_12.open(map_0, marker_12);
                                });

                                infowindows.push(infowindow_12);

                                info_city_10 = infowindow_12;


                                var markerPosition_13 = new google.maps.LatLng(31.347639601139402, 34.30333233593751);

                                var marker_13 = new google.maps.Marker({
                                    position: markerPosition_13,


                                    title: "\u062e\u0627\u0646\u064a\u0648\u0646\u0633",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_area_18 = marker_13;
                                bounds.extend(marker_13.position);

                                marker_13.setMap(map_0);
                                markers.push(marker_13);


                                var infowindow_13 = new google.maps.InfoWindow({
                                    content: "\u062e\u0627\u0646\u064a\u0648\u0646\u0633"
                                });


                                google.maps.event.addListener(marker_13, 'click', function () {
                                    infowindow_13.open(map_0, marker_13);
                                });

                                infowindows.push(infowindow_13);

                                info_area_18 = infowindow_13;


                                var markerPosition_14 = new google.maps.LatLng(31.37812815974922, 34.30745220898439);

                                var marker_14 = new google.maps.Marker({
                                    position: markerPosition_14,


                                    title: "\u0627\u0644\u0642\u0631\u0627\u0631\u0629",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_8 = marker_14;
                                bounds.extend(marker_14.position);

                                marker_14.setMap(map_0);
                                markers.push(marker_14);


                                var infowindow_14 = new google.maps.InfoWindow({
                                    content: "\u0627\u0644\u0642\u0631\u0627\u0631\u0629"
                                });


                                google.maps.event.addListener(marker_14, 'click', function () {
                                    infowindow_14.open(map_0, marker_14);
                                });

                                infowindows.push(infowindow_14);

                                info_city_8 = infowindow_14;


                                var markerPosition_15 = new google.maps.LatLng(31.32007412881946, 34.33766461132814);

                                var marker_15 = new google.maps.Marker({
                                    position: markerPosition_15,


                                    title: "\u0639\u0628\u0633\u0627\u0646 \u0627\u0644\u0643\u0628\u064a\u0631\u0629 ",
                                    visible: false,
                                    animation: google.maps.Animation.DROP,
                                    icon: ''
                                });
                                infoMarker_city_9 = marker_15;
                                bounds.extend(marker_15.position);

                                marker_15.setMap(map_0);
                                markers.push(marker_15);


                                var infowindow_15 = new google.maps.InfoWindow({
                                    content: "\u0639\u0628\u0633\u0627\u0646 \u0627\u0644\u0643\u0628\u064a\u0631\u0629 "
                                });


                                google.maps.event.addListener(marker_15, 'click', function () {
                                    infowindow_15.open(map_0, marker_15);
                                });

                                infowindows.push(infowindow_15);

                                info_city_9 = infowindow_15;


                                var idleListener = google.maps.event.addListenerOnce(map_0, "idle", function () {
                                    map_0.setZoom(12);


                                    if (typeof navigator !== 'undefined' && navigator.geolocation) {
                                        navigator.geolocation.getCurrentPosition(function (position) {
                                            map_0.setCenter(new google.maps.LatLng(position.coords.latitude, position.coords.longitude));
                                        });
                                    }
                                });


                                maps.push({
                                    key: 0,
                                    markers: markers,
                                    infowindows: infowindows,
                                    map: map_0,
                                    shapes: shapes
                                });
                            }

                            var ready = (function () {
                                var ready_event_fired = false;
                                var ready_event_listener = function (fn) {

                                    // Create an idempotent version of the 'fn' function
                                    var idempotent_fn = function () {
                                        if (ready_event_fired) {
                                            return;
                                        }
                                        ready_event_fired = true;
                                        return fn();
                                    }

                                    // The DOM ready check for Internet Explorer
                                    var do_scroll_check = function () {
                                        if (ready_event_fired) {
                                            return;
                                        }

                                        // If IE is used, use the trick by Diego Perini
                                        // http://javascript.nwbox.com/IEContentLoaded/
                                        try {
                                            document.documentElement.doScroll('left');
                                        } catch (e) {
                                            setTimeout(do_scroll_check, 1);
                                            return;
                                        }

                                        // Execute any waiting functions
                                        return idempotent_fn();
                                    }

                                    // If the browser ready event has already occured
                                    if (document.readyState === "complete") {
                                        return idempotent_fn()
                                    }

                                    // Mozilla, Opera and webkit nightlies currently support this event
                                    if (document.addEventListener) {

                                        // Use the handy event callback
                                        document.addEventListener("DOMContentLoaded", idempotent_fn, false);

                                        // A fallback to window.onload, that will always work
                                        window.addEventListener("load", idempotent_fn, false);

                                        // If IE event model is used
                                    } else if (document.attachEvent) {

                                        // ensure firing before onload; maybe late but safe also for iframes
                                        document.attachEvent("onreadystatechange", idempotent_fn);

                                        // A fallback to window.onload, that will always work
                                        window.attachEvent("onload", idempotent_fn);

                                        // If IE and not a frame: continually check to see if the document is ready
                                        var toplevel = false;

                                        try {
                                            toplevel = window.frameElement == null;
                                        } catch (e) {
                                        }

                                        if (document.documentElement.doScroll && toplevel) {
                                            return do_scroll_check();
                                        }
                                    }
                                };
                                return ready_event_listener;
                            })();
                            ready(function () {
                                google.maps.event.addDomListener(window, 'load', initialize_0)
                            });

                        </script>


                    </div>

                </div>
                <div class="col-md-12" id="sr-form-submit" style="botton:0px;margin-bottom:20px">
                    <input type="submit" class="form-control btn btn-primary" value="Submit">
                </div>


            </div>
            <div style="border-bottom: 1px solid #eff2f7;margin-top:20px;margin-bottom:20px;" class="row"></div>

            <div class="requests col-md-12">
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
                <div class="col-md-6 col-sm-6 mb" style="margin-bottom: 80px;">
                    <div class="stock card">
                        <div class="stock-chart">
                            <div class="row" style="overflow: hidden;margin:auto;height:230px;">
                                <img src="https://maps.googleapis.com/maps/api/staticmap?center=31.3546763,34.30882550000001&zoom=12&size=1000x250&maptype=roadmap
                        &key=AIzaSyC-oVVA8bUFJvkCaS4K6mU-pL05LC7MWuI" style="margin-left: -3em; margin-top: -2em"
                                     width="680px">
                            </div>
                        </div>
                        <div class="stock current-price">
                            <div class="row">
                                <div class="info col-sm-6 col-xs-6"><abbr>Protection </abbr>
                                    Children Protection
                                </div>
                                <div class="changes col-sm-6 col-xs-6" style="padding-top: 8px;">
                                    <abbr> <i class="fa fa-location-arrow" aria-hidden="true"></i> Gaza - Al Zaitoon -
                                        star
                                    </abbr>
                                    <div class="change hidden-sm hidden-xs bottom-right">
                                        <time>Yesterday</time>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>


            </div>

        </div>


    </div>
@endsection