@extends('layout/employer_container')
@section('content')
    <div class="card">
        <div class="card-header card-header-tabs card-header-info  ">
        <h4 class="card-title"><i class="material-icons">dashboard</i> Dashboard</h4>
        </div>
        <div class="card-body">
                <div class="row">
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card card-stats" style="background-color:gainsboro">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">account_circle</i>
                                </div>
                                    <p class="card-category">No. of Users Online</p>
                                    <h3 class="card-title">49/50</h3>
                                </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons text-danger">warning</i>
                                    Max users reached 
                                </div>
                                <br><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card card-stats" style="background-color:gainsboro">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">assignment</i>
                                </div>
                                    <p class="card-category">Requests Completed</p>
                                    <h3 class="card-title">159/232</h3>
                                </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>
                                </div>
                                <select id='request_months' class='form-control'>
                                        <option value='' selected>August 2018</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-sm-12">
                        <div class="card card-stats" style="background-color:gainsboro">
                            <div class="card-header card-header-info card-header-icon">
                                <div class="card-icon">
                                    <i class="material-icons">rate_review</i>
                                </div>
                                    <p class="card-category">Approved Reviews</p>
                                    <h3 class="card-title">22/74</h3>
                                </div>
                            <div class="card-footer">
                                <div class="stats">
                                    <i class="material-icons">date_range</i>
                                </div>
                                <select id='review_months' class='form-control'>
                                        <option value='' selected>August 2018</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="card card-chart" style="background-color:gainsboro">
                            <div class="card-header card-header-info">
                            <div class="ct-chart" id="completedTasksChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-line" style="width: 100%; height: 100%;"><g class="ct-grids"><line x1="40" x2="40" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="69.25" x2="69.25" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="98.5" x2="98.5" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="127.75" x2="127.75" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="157" x2="157" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="186.25" x2="186.25" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="215.5" x2="215.5" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line x1="244.75" x2="244.75" y1="0" y2="120" class="ct-grid ct-horizontal"></line><line y1="120" y2="120" x1="40" x2="274" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="274" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="274" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="274" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="274" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="274" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><path d="M 40 92.4 C 69.25 30 69.25 30 69.25 30 C 98.5 66 98.5 66 98.5 66 C 127.75 84 127.75 84 127.75 84 C 157 86.4 157 86.4 157 86.4 C 186.25 91.2 186.25 91.2 186.25 91.2 C 215.5 96 215.5 96 215.5 96 C 244.75 97.2 244.75 97.2 244.75 97.2" class="ct-line"></path><line x1="40" y1="92.4" x2="40.01" y2="92.4" class="ct-point" ct:value="230" opacity="1"></line><line x1="69.25" y1="30" x2="69.26" y2="30" class="ct-point" ct:value="750" opacity="1"></line><line x1="98.5" y1="66" x2="98.51" y2="66" class="ct-point" ct:value="450" opacity="1"></line><line x1="127.75" y1="84" x2="127.76" y2="84" class="ct-point" ct:value="300" opacity="1"></line><line x1="157" y1="86.4" x2="157.01" y2="86.4" class="ct-point" ct:value="280" opacity="1"></line><line x1="186.25" y1="91.2" x2="186.26" y2="91.2" class="ct-point" ct:value="240" opacity="1"></line><line x1="215.5" y1="96" x2="215.51" y2="96" class="ct-point" ct:value="200" opacity="1"></line><line x1="244.75" y1="97.2" x2="244.76" y2="97.2" class="ct-point" ct:value="190" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="29.25" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 29px; height: 20px;">12p</span></foreignObject></div>
                            </div>
                            <div class="card-body">
                            <h4 class="card-title">Job Request Rate</h4>
                            <p class="card-category">3rd Quarter 2018</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                            <div class="card card-chart" style="background-color:gainsboro">
                              <div class="card-header card-header-info">
                                <div class="ct-chart" id="websiteViewsChart"><svg xmlns:ct="http://gionkunz.github.com/chartist-js/ct" width="100%" height="100%" class="ct-chart-bar" style="width: 100%; height: 100%;"><g class="ct-grids"><line y1="120" y2="120" x1="40" x2="269" class="ct-grid ct-vertical"></line><line y1="96" y2="96" x1="40" x2="269" class="ct-grid ct-vertical"></line><line y1="72" y2="72" x1="40" x2="269" class="ct-grid ct-vertical"></line><line y1="48" y2="48" x1="40" x2="269" class="ct-grid ct-vertical"></line><line y1="24" y2="24" x1="40" x2="269" class="ct-grid ct-vertical"></line><line y1="0" y2="0" x1="40" x2="269" class="ct-grid ct-vertical"></line></g><g><g class="ct-series ct-series-a"><line x1="49.541666666666664" x2="49.541666666666664" y1="120" y2="54.959999999999994" class="ct-bar" ct:value="542" opacity="1"></line><line x1="68.625" x2="68.625" y1="120" y2="66.84" class="ct-bar" ct:value="443" opacity="1"></line><line x1="87.70833333333333" x2="87.70833333333333" y1="120" y2="81.6" class="ct-bar" ct:value="320" opacity="1"></line><line x1="106.79166666666667" x2="106.79166666666667" y1="120" y2="26.400000000000006" class="ct-bar" ct:value="780" opacity="1"></line><line x1="125.875" x2="125.875" y1="120" y2="53.64" class="ct-bar" ct:value="553" opacity="1"></line><line x1="144.95833333333331" x2="144.95833333333331" y1="120" y2="65.64" class="ct-bar" ct:value="453" opacity="1"></line><line x1="164.04166666666666" x2="164.04166666666666" y1="120" y2="80.88" class="ct-bar" ct:value="326" opacity="1"></line><line x1="183.12499999999997" x2="183.12499999999997" y1="120" y2="67.92" class="ct-bar" ct:value="434" opacity="1"></line><line x1="202.20833333333331" x2="202.20833333333331" y1="120" y2="51.84" class="ct-bar" ct:value="568" opacity="1"></line><line x1="221.29166666666666" x2="221.29166666666666" y1="120" y2="46.8" class="ct-bar" ct:value="610" opacity="1"></line><line x1="240.37499999999997" x2="240.37499999999997" y1="120" y2="29.28" class="ct-bar" ct:value="756" opacity="1"></line><line x1="259.4583333333333" x2="259.4583333333333" y1="120" y2="12.599999999999994" class="ct-bar" ct:value="895" opacity="1"></line></g></g><g class="ct-labels"><foreignObject style="overflow: visible;" x="40" y="125" width="19.083333333333332" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="59.08333333333333" y="125" width="19.083333333333332" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">F</span></foreignObject><foreignObject style="overflow: visible;" x="78.16666666666666" y="125" width="19.083333333333336" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="97.25" y="125" width="19.08333333333333" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="116.33333333333333" y="125" width="19.08333333333333" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">M</span></foreignObject><foreignObject style="overflow: visible;" x="135.41666666666666" y="125" width="19.083333333333343" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="154.5" y="125" width="19.083333333333314" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">J</span></foreignObject><foreignObject style="overflow: visible;" x="173.58333333333331" y="125" width="19.083333333333343" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">A</span></foreignObject><foreignObject style="overflow: visible;" x="192.66666666666666" y="125" width="19.083333333333343" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">S</span></foreignObject><foreignObject style="overflow: visible;" x="211.75" y="125" width="19.083333333333314" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">O</span></foreignObject><foreignObject style="overflow: visible;" x="230.83333333333331" y="125" width="19.083333333333343" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 19px; height: 20px;">N</span></foreignObject><foreignObject style="overflow: visible;" x="249.91666666666666" y="125" width="30" height="20"><span class="ct-label ct-horizontal ct-end" xmlns="http://www.w3.org/2000/xmlns/" style="width: 30px; height: 20px;">D</span></foreignObject><foreignObject style="overflow: visible;" y="96" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">0</span></foreignObject><foreignObject style="overflow: visible;" y="72" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">200</span></foreignObject><foreignObject style="overflow: visible;" y="48" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">400</span></foreignObject><foreignObject style="overflow: visible;" y="24" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">600</span></foreignObject><foreignObject style="overflow: visible;" y="0" x="0" height="24" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 24px; width: 30px;">800</span></foreignObject><foreignObject style="overflow: visible;" y="-30" x="0" height="30" width="30"><span class="ct-label ct-vertical ct-start" xmlns="http://www.w3.org/2000/xmlns/" style="height: 30px; width: 30px;">1000</span></foreignObject></g></svg></div>
                              </div>
                              <div class="card-body">
                                <h4 class="card-title">Job Matching Rate</h4>
                                <p class="card-category">3rd Quarter 2018</p>
                              </div>  
                            </div>
                          </div>
                </div>
        </div>
    </div>
@endsection