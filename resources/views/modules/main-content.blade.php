<main class="inner_m" id="mymain">

    <section id="top_slider" class="container-fluid no_all">
        <ul class="bxslider">
            @foreach($slides as $slide)
                <li><img src="{{url('images/Slider/' . $slide['photo'])}}" class="img-responsive"
                         alt="{{$slide['title']}}"></li>
            @endforeach
        </ul>
        <a class="caro-button" id="t_playButton" role="button"><span class="fa fa-play-circle"></span></a>
        <a class="caro-button" id="t_pauseButton" role="button"><span class="fa fa-pause-circle-o"></span></a>
        <a class="caro-button" id="t_nextButton" role="button"><span class="fa fa-chevron-circle-right"></span></a>
        <a class="caro-button" id="t_prevButton" role="button"><span class="fa fa-chevron-circle-left"></span></a>
    </section>

    <section id="headlines" class="container-fluid no_all">
        <div class="col-md-2 col-xs-12 no_all">
            <h3 class="text-left" title="{{__("static.Headlines")}}">{{__("static.Headlines")}}</h3>
            <a class="caro-button" id="h_playButton" role="button" onclick="hresume()"><span
                        class="fa fa-play-circle"></span></a>
            <a class="caro-button" id="h_pauseButton" role="button" onclick="hpause()"><span
                        class="fa fa-pause-circle-o"></span></a>
        </div>
        <div class="col-md-10 col-xs-12" id="updates">
            <ul class="no_all marquee">
                @foreach($headlines as $headline)
                    <li><a href="{{$headline['link']}}"><h4>{{$headline['title']}}</h4></a></li>
                @endforeach
            </ul>
        </div>
    </section>

    <section id="center_section" class="container-fluid text-center">

        <div id="center_marq" class="col-md-3 col-sm-6 col-xs-12 no_all">
            <div class="card" id="m_slider">
                <div class="row no_all head_marq">
                    <h3 class="text-center" title="{{__("static.Updates")}}">{{__("static.Updates")}}</h3>
                    <a class="caro-button" id="m_playButton" role="button" title="Play Button" onclick="mresume()"><span
                                class="fa fa-play-circle"></span></a>
                    <a class="caro-button" id="m_pauseButton" role="button" title="Pause Button"
                       onclick="mpause()"><span class="fa fa-pause-circle-o"></span></a>
                    <hr>
                </div>
                <div id="m_slider2" class="row no_all text-left">
                    <ul class="marquee">
                        @foreach($updates as $update)
                            <li><a href="#"><h4>{{$update['title']}}</h4></a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div id="district_sel" class="row no_all card">
                <h4 title="{{__("static.District_Police_Commissionerate")}}">{{__("static.District_Police_Commissionerate")}}</h4>
                <select class="home-ds-select" name="ps" title="District/Police Commissionerates">
                    @foreach($districts as $district)
                        <option value="{{$district['link']}}" title="{{$district['name']}}">{{$district['name']}}</option>
                    @endforeach
                </select>
            </div>
            @section('page-spec')
                <script src="{{url('js/jquery.jfontsize-1.0.js')}}"></script>
                <script>
                    $(".home-ds-select").change(function () {
                        var url = $(this).val();
                        var win = window.open(url, '_blank');
                        if (win) {
                            //Browser has allowed it to be opened
                            win.focus();
                        } else {
                            //Browser has blocked it
                            alert('Please allow popups for this website');
                        }
                    });
                    $('.main-body').jfontsize({
                        btnMinusClasseId: '.dec-font',
                        btnDefaultClasseId: '.def-font',
                        btnPlusClasseId: '.inc-font',
                        btnMinusMaxHits: 1,
                        btnPlusMaxHits: 5,
                        sizeChange: 1
                    });

                </script>
            @stop
        </div>

        <div id="center_left" class="col-md-3 col-sm-6 col-xs-12 no_all pull-right">
            <div class="card">
                <h3 title="{{__("static.Important_Links")}}">{{__("static.Important_Links")}}</h3>
                <hr>
                <ul class="text-center">
				<li class="center_link">
                    <a href="{{url('OfficerProfile')}}" title="{{__("static.Officers_Profile")}}"><p>
                        <span class="col-md-2 no_all fa icofont icofont-police-badge"></span>
                        <span data-hover="{{__("static.Officers_Profile")}}">{{__("static.Officers_Profile")}}</span></p>
                    </a>
                </li>
                <li class="center_link">
                    <a href="{{url('Recruitment')}}" title="{{__("static.Police_Recruitment")}}"><p>
                        <span class="col-md-2 no_all fa fa-user-plus"></span>
                        <span data-hover="{{__("static.Police_Recruitment")}}">{{__("static.Police_Recruitment")}}</span></p>
                    </a>
                </li>
                <li class="center_link">
                    <a href="{{url('ImportantContacts')}}" title="{{__("static.Emergency_Contacts")}}"><p>
                        <span class="col-md-2 no_all fa fa-phone"></span>
                        <span data-hover="{{__("static.Emergency_Contacts")}}">{{__("static.Emergency_Contacts")}}</span></p>
                    </a>
                </li>
                <li class="center_link">
                    <a href="{{url('Achievements')}}" title="{{__("static.Rewards_Honors")}}"><p>
                        <span class="col-md-2 no_all fa fa-trophy"></span>
                        <span data-hover="{{__("static.Rewards_Honors")}}">{{__("static.Rewards_Honors")}}</span></p>
                    </a>
                </li>
                <li class="center_link">
                    <a href="{{url('WomenSafety')}}" title="{{__("static.Women_Safety")}}"><p>
                        <span class="col-md-2 no_all fa fa-female"></span>
                        <span data-hover="{{__("static.Women_Safety")}}">{{__("static.Women_Safety")}}</span></p>
                    </a>
                </li>
                <li class="center_link">
                    <a href="{{url('SeniorCitizen')}}" title="{{__("static.Senior_Citizens_Corner")}}"><p>
                        <span class="col-md-2 no_all fa fa-wheelchair"></span>
                        <span data-hover="{{__("static.Senior_Citizens_Corner")}}">{{__("static.Senior_Citizens_Corner")}}</span></p>
                    </a>
                </li>
                <li class="center_link">
                    <a href="{{url('RTI')}}" title="{{__("static.Right_To_Informatio")}}"><p>
                        <span class="col-md-2 no_all fa fa-paste"></span>
                        <span data-hover="{{__("static.Right_To_Informatio")}}">{{__("static.Right_To_Informatio")}}</span></p>
                    </a>
                </li>
				<!--<li class="center_link">
                    <a href="#" title="Download Applications Link"><p>
                        <span class="col-md-2 no_all fa fa-download"></span>
                        <span data-hover="Download Applications">{{__("static.Download_Applications")}}</span></p>
                    </a>
                </li>-->
                 <li class="center_link">
                    <a href="http://www.mhpolice.maharashtra.gov.in/Citizen/MH/SearchView.aspx" title="{{__("static.Missing_Persons")}}"><p>
                        <span class="col-md-2 no_all fa fa-user-o"></span>
                        <span data-hover="{{__("static.Missing_Persons")}}">{{__("static.Missing_Persons")}}</span></p>
                    </a>
                </li>
                <li class="center_link">
                    <a href="http://www.mhpolice.maharashtra.gov.in/Citizen/MH/SearchDeadBodyList.aspx" title="{{__("static.Unidentified_Dead_Bodies")}}"><p>
                        <span class="col-md-2 no_all fa icofont icofont-finger-print"></span>
                        <span data-hover="{{__("static.Unidentified_Dead_Bodies")}}">{{__("static.Unidentified_Dead_Bodies")}}</span></p>
                    </a>
                </li>

                <li class="center_link">
                    <a href="http://vahanchoritakrar.com/" title="{{__("static.Stolen_Found_Vehicles")}}"><p>
                        <span class="col-md-2 no_all fa fa-cab"></span>
                        <span data-hover="{{__("static.Stolen_Found_Vehicles")}}">{{__("static.Stolen_Found_Vehicles")}}</span></p>
                    </a>
                </li>

                <li class="center_link">
                    <a href="http://www.mhpolice.maharashtra.gov.in/Citizen/MH/PublishedFIRs.aspx" title="{{__("static.Registered_FIRs")}}"><p>
                        <span class="col-md-2 no_all fa icofont icofont-law-document"></span>
                        <span data-hover="{{__("static.Registered_FIRs")}}">{{__("static.Registered_FIRs")}}</span></p>
                    </a>
                </li>

            </ul>
            </div>
        </div>

        <div id="center_tiles" class="col-md-6 col-sm-12 col-xs-12 no_all">
            <ul class="text-center">
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('PressRelease')}}" title="{{__("static.Press_Release")}}">
                    <div class="card"><span class="fa fa-3x fa-newspaper-o"></span><hr>
                        <p><span data-hover="{{__("static.Press_Release")}}">{{__("static.Press_Release")}}</span></p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('OnlineComplaints')}}" title="{{__("static.Online_Complaint")}}">
                    <div class="card">
                        <span class="fa fa-3x fa-pencil-square-o"></span><hr>
                        <p><span data-hover="{{__("static.Online_Complaint")}}">{{__("static.Online_Complaint")}}</span></p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('NewsEvent')}}" title="{{__("static.News_Events")}}">
                    <div class="card">
                        <span class="fa fa-3x fa-calendar-plus-o"></span><hr>
                        <p><span data-hover="{{__("static.News_Events")}}">{{__("static.News_Events")}}</span></p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('PositiveStories')}}" title="{{__("static.Positive_Stories")}}">
                    <div class="card">
                        <span class="fa fa-3x fa-universal-access"></span><hr>
                        <p><span data-hover="{{__("static.Positive_Stories")}}">{{__("static.Positive_Stories")}}</span></p>
                    </div>
                </a>
            </li>
           <!-- <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('AlertWall')}}" title="{{__("static.Alert_Wall")}}">
                    <div class="card">
                        <span class="fa fa-3x fa-warning"></span><hr>
                        <p><span data-hover="{{__("static.Alert_Wall")}}">{{__("static.Alert_Wall")}}</span></p>
                    </div>
                </a>
            </li>-->
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="http://www.mhpolice.maharashtra.gov.in/Citizen/MH/Index.aspx" title="{{__("static.Citizen_Portal")}}">
                    <div class="card">
                        <img src="{{url('img/icon9.png')}}" alt="Maha Police Logo" height="49px"><hr>
                        <p><span data-hover="{{__("static.Citizen_Portal")}}">{{__("static.Citizen_Portal")}}</span></p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('Flash')}}" title="{{__("static.Flash")}}">
                    <div class="card">
                        <span class="fa fa-3x fa-bolt"></span><hr>
                        <p><span data-hover="{{__("static.Flash")}}">{{__("static.Flash")}}</span></p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('Gallery')}}" title="{{__("static.Gallery")}}">
                    <div class="card">
                        <span class="fa fa-3x fa-picture-o"></span><hr>
                        <p><span data-hover="{{__("static.Gallery")}}">{{__("static.Gallery")}}</span></p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('PoliceCorner')}}" title="{{__("static.Police_Corner")}}">
                    <div class="card">
                        <span class="fa fa-3x icofont icofont-cop-badge"></span><hr>
                        <p><span data-hover="{{__("static.Police_Corner")}}">{{__("static.Police_Corner")}}</span></p>
                    </div>
                </a>
            </li>
            <li class="col-md-4 col-sm-4 col-xs-12 no_all">
                <a href="{{url('Posting')}}" title="{{__("static.Posting_Details")}}">
                    <div class="card">
                        <span class="fa fa-3x fa-map-marker"></span><hr>
                        <p><span data-hover="{{__("static.Posting_Details")}}">{{__("static.Posting_Details")}}</span></p>
                    </div>
                </a>
            </li>

        </ul>
        </div>

    </section>

</main>
