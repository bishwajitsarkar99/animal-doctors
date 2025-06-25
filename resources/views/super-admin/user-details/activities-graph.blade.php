<?php
    $progressBarCards = [
        [
            'label' => 'Total Current Login Users',
            'labelClass' => 'login-user-title ps-4',
            'progressClass' => 'progress mt-2',
            'progressBarHeight' => 'height:0.8rem;',
            'progressBarId' => 'current_login_activites_percentage_records',
            'progressBarBg' => 'bg-login',
            'roundedBadgeClass' => 'badge rounded-pill bg-login',
            'roundedBadgeStyle' => 'font-size: 11px;',
            'recordLabelClass' => 'total_users',
            'recordLabelStyle' => 'font-weight: 600;color:white;',
            'recordId' => 'current_login_activites_records',
        ],
        [
            'label' => 'Total Current Logout Activity',
            'labelClass' => 'login-user-title ps-4',
            'progressClass' => 'progress mt-2',
            'progressBarHeight' => 'height:0.8rem;',
            'progressBarId' => 'current_logout_activites_percentage_records',
            'progressBarBg' => 'bg-light-alert',
            'roundedBadgeClass' => 'badge rounded-pill bg-light-alert',
            'roundedBadgeStyle' => 'font-size: 11px;',
            'recordLabelClass' => 'total_users',
            'recordLabelStyle' => 'font-weight: 600;color:white;',
            'recordId' => 'current_logout_activites_records',
        ],
        [
            'label' => 'Total Current Activity Users',
            'labelClass' => 'login-user-title ps-4',
            'progressClass' => 'progress mt-2',
            'progressBarHeight' => 'height:0.8rem;',
            'progressBarId' => 'current_total_activites_percentage_records',
            'progressBarBg' => 'bg-activity',
            'roundedBadgeClass' => 'badge rounded-pill bg-login',
            'roundedBadgeStyle' => 'font-size: 11px;',
            'recordLabelClass' => 'total_users',
            'recordLabelStyle' => 'font-weight: 600;color:white;',
            'recordId' => 'total_current_activites_records',
        ],
    ];
?>
@if($user_activity_graph_authorize ==1)
<!-- ==== User-Activities Analysis Graph ======= -->
@if($user_log_data_table_permission == 1)
<div class="row">
    <div class="container">
        <x-chart-cards.chart-card cardBg="chart-card pt-3 pb-3" borderStyle="border-style">
            <div class="row mb-2">
                <div class="col-xl-12">
                    <!-- Current Day Data -->
                    <x-chart-cards.progress-bar-cards.body.card-body cardBodyClass="card card-body border-style card-background">
                        @foreach($progressBarCards as $data)
                            <x-chart-cards.progress-bar-cards.body.card-content
                                cardLabel="{{ $data['label'] }}"
                                cardLabelClass="{{ $data['labelClass'] }}"
                                cardProgressClass="{{ $data['progressClass'] }}"
                                cardProgressStyle="{{ $data['progressBarHeight'] }}"
                                cardResultId="{{ $data['progressBarId'] }}"
                                cardProgressBg="{{ $data['progressBarBg'] }}"
                                cardBadgeRounded="{{ $data['roundedBadgeClass'] }}"
                                cardBadgeRoundedStyle="{{ $data['roundedBadgeStyle'] }}"
                                cardRecordClass="{{ $data['recordLabelClass'] }}"
                                cardRecordStyle="{{ $data['recordLabelStyle'] }}"
                                cardRecordId="{{ $data['recordId'] }}"
                            />
                        @endforeach
                    </x-chart-cards.progress-bar-cards.body.card-body>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-6">
                    <!-- Weekly Data Chart -->
                    <x-chart-cards.chart-card cardBg="" borderStyle="border-style">
                        <x-chart-cards.chart-activity-card-header 
                            cardHeadSkeletone="head-skeletone"
                            loaderSkeletone="loader_skeleton"
                            iconColor="#2e42cb7d"
                            title="Current Users Log Activities Line Chart ( Per Week )"
                            loaderId="loader_orderChart"
                            textAlign="center"
                        />
                        <x-chart-cards.chart-card-body
                            cardBodySkeletone="chart-body-skeletone"
                            cardBodyBg=""
                            borderStyle="border-style"
                            cardBodyAnimation="user-activities--week-chart"
                            svgId="svgIcon"
                            svgClass="chart-svg"
                            svgWidth="100%"
                            svgHeight="100px"
                            svgColor="#969696"
                            canvasHeight="106"
                            canvasId="userDayLogChart"
                        />
                    </x-chart-cards.chart-card>
                </div>
                <div class="col-xl-6">
                    <!-- Monthly Data Chart -->
                    <x-chart-cards.chart-card cardBg="" borderStyle="border-style">
                        <x-chart-cards.chart-card-header 
                            cardTopBorder=""
                            cardHeadSkeletone="head-skeletone"
                            loaderSkeletone="loader_skeleton"
                            iconColor="#2e42cb7d"
                            title="Current Users Log Activities Bar Chart ( Per Month )"
                            loaderId="loader_acivityChart"
                            textAlign="center"
                        />
                        <x-chart-cards.chart-card-body
                            cardBodySkeletone="body-skeletone"
                            cardBodyBg=""
                            borderStyle="border-style"
                            cardBodyAnimation="user-activities--month-chart"
                            svgId="svgIcon2"
                            svgClass="chart-svg-two"
                            svgWidth="100%"
                            svgHeight="95px"
                            svgColor="#969696"
                            canvasHeight="106"
                            canvasId="userMonthLogChart"
                        />
                    </x-chart-cards.chart-card>
                </div>
            </div>
        </x-chart-card>
        <x-chart-cards.multi-chart-cards.multi-chart chartClass="chart-card mb-4">
            <div class="row mt-4 mb-3">
                <div class="col-xl-12">
                    <?php
                        $flex=['filexGroup'=>'input-group', 'filexId'=>'filteringBox', 'filexLabel'=>'Download', 'filexContent'=>'--filex-box-medium-content', 'filexBoxArrow'=>'filex-box-arrow'];
                    ?>
                    <?php
                        $group_flex_box=[
                            ['label'=>'Branch','inputPlaceholder'=>'Branch Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Remove','buttonLabelTwo'=>'Enable','searchLabel'=>'search'],
                            ['label'=>'Role','inputPlaceholder'=>'Role Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Remove','buttonLabelTwo'=>'Enable','searchLabel'=>'search'],
                            ['label'=>'Email','inputPlaceholder'=>'Email Search','buttonClass'=>'btn btn-sm refresh-btn ripple-surface','buttonLabelOne'=>'Remove','buttonLabelTwo'=>'Enable','searchLabel'=>'search'],
                        ]; 
                    ?>
                    <x-chart-cards.multi-chart-cards.multi-chart-header
                        parentClass="card-header max-card-header"
                        childClass="card-head-title head-skeletone"
                        iconColor='rgba(46, 66, 203, 0.49)'
                        chartLabel="Users Log Activities Line Chart"
                        groupClass="group_box"
                        inputGroupClass="input-group"
                        inputLabelOne="Form :"
                        inputLabelTwo="To :"
                        inputClass="form-control form-control-sm input-date"
                        inputType="text"
                        inputFirstName="start_date" 
                        inputSecondName="end_date" 
                        inputPlaceHolder="DD-MM-YYYY" 
                        inputFirstId="chartStartDate" 
                        inputSecondId="chartEndDate" 
                        iconClass="icon-box"
                        iconStyle="line-height: 1.2;"
                        svgWidth="18"
                        svgHeight="18"
                        svgStroke="white"
                        svgStrokeWidth="2"
                        svgFillColor="rgb(170, 170, 170)"

                        filexGroup="{{ $flex['filexGroup'] }}"
                        filexId="{{ $flex['filexId'] }}"
                        filexLabel="{{ $flex['filexLabel'] }}"
                        filexContent="{{ $flex['filexContent'] }}"
                        filexUpArrw="{{ $flex['filexBoxArrow'] }}"
                    />
                    <x-chart-cards.multi-chart-cards.multi-chart-body cardBodyClass="border-style">
                        <x-chart-cards.multi-chart-cards.multi-chart-box cardBoxClass="user-activities--month-chart mb-5">
                            <!-- Total all data chart -->
                            <x-chart-cards.multi-chart-cards.multi-chart-canvas
                                canvasClass="user-activities--month-chart mb-1"
                                monthlyLogChartId="userAllLogChart"
                                monthlyLogChartHeight="80"
                                dateLogChartId="allUserDateLogChart" 
                                dateLogChartHeight="36"
                            />
                            <x-date-range-filter-cards.date-range-card
                                dateRangeCardClass="dual-range-container mt-2"
                                dateRangeId="dateRange"
                                firstWrapperClass="slider-wrapper-first"
                                leftInputRangeSliderId="rangeLeftSlider"
                                leftTooltipId="leftTooltip"
                                rightTooltipId="rightTooltip"
                                tooltipClass="range-tooltip"
                                inputRangeClass="dual-range"
                                inputRangeMin="0"
                                inputRangeMax="365"
                                leftinputRangeValue="0"
                                rightinputRangeValue="365"
                                inputRangeSliderType="range"
                                secondWrapperClass="slider-wrapper-second"
                                rightInputRangeSliderId="rangeRightSlider"
                                dateRangeTrackingClass="range-track"
                                dateRangeSvgChartId="cruveChart"
                                dateRangeSvgChartViewBox="0 0 800 50"
                                dateRangeSvgChartFill="rgba(0,123,255,0.2)"
                                dateRangeSvgChartStyle="border: none;background: #f9f9f9;overflow: hidden;path {fill: none;stroke-width: 2.5;display: block;margin: none;}"
                                dateRangeSvgChartWidth="800"
                                dateRangeSvgChartHeight="50"
                                dateRangeSvgChartRectFill="white"
                            />
                        </x-chart-cards.multi-chart-cards.multi-chart-box>
                    </x-chart-cards.multi-chart-cards.multi-chart-body>
                </div>
            </div>
        </x-chart-cards.multi-chart-cards.multi-chart>
    </div>
</div>
<div class="row">
    <div class="col-xl-12">
        <div class="--page-head">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" width="80px" height="80px" viewBox="0 0 24 24"><defs>
                    <style>.cls-1{fill:#aecbfa;}.cls-1,.cls-2,.cls-3{fill-rule:evenodd;}.cls-2{fill:#669df6;}.cls-3{fill:#4285f4;}</style></defs>
                    <title>Icon_24px_SQL_Color</title>
                    <g data-name="Product Icons">
                        <g>
                            <polygon class="cls-1" points="4.67 10.44 4.67 13.45 12 17.35 12 14.34 4.67 10.44"/>
                            <polygon class="cls-1" points="4.67 15.09 4.67 18.1 12 22 12 18.99 4.67 15.09"/>
                            <polygon class="cls-2" points="12 17.35 19.33 13.45 19.33 10.44 12 14.34 12 17.35"/>
                            <polygon class="cls-2" points="12 22 19.33 18.1 19.33 15.09 12 18.99 12 22"/>
                            <polygon class="cls-3" points="19.33 8.91 19.33 5.9 12 2 12 5.01 19.33 8.91"/>
                            <polygon class="cls-2" points="12 2 4.67 5.9 4.67 8.91 12 5.01 12 2"/>
                            <polygon class="cls-1" points="4.67 5.87 4.67 8.89 12 12.79 12 9.77 4.67 5.87"/>
                            <polygon class="cls-2" points="12 12.79 19.33 8.89 19.33 5.87 12 9.77 12 12.79"/>       
                        </g>
                    </g>
                </svg>
            </span>
            Server Connection
        </div>
    </div>
</div>
<div class="row" style="position: relative; height: 300px;">
    <svg id="svg" style="width: 100%; height: 100%; position: absolute; top: 0; left: 0; pointer-events: none;">
        <!-- Connection 1: server -->
        <g class="connection" id="connectorServer">
            <path class="connectorPath" fill="none" stroke="#4e73df" stroke-width="3" stroke-linecap="round"/>
            <circle class="startSocket" r="5" fill="#4e73df" />
            <g class="endSocket" fill="#4e73df">
                <g transform="scale(1) translate(-12, -12)">
                    <path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/><line x1="8" y1="12" x2="16" y2="12"/>
                </g>
            </g>
        </g>

        <!-- Connection 2: database -->
        <g class="connection" id="connectorDatabseGroup">
            <path class="connectorPath" fill="none" stroke="#4e73df" stroke-width="3" stroke-linecap="round"/>
            <circle class="startSocket" r="5" fill="#4e73df" />
            <circle class="endSocket" r="5" fill="#4e73df" />
        </g>

        <!-- Connection 2: database to user table -->
        <g class="connection" id="connectorUserGroup">
            <path class="connectorPath" fill="none" stroke="#4e73df" stroke-width="3" stroke-linecap="round"/>
            <circle class="startSocket" r="5" fill="#4e73df" />
            <g class="endSocket" fill="#4e73df">
                <g transform="scale(1) translate(-12, -12)">
                    <path d="M21.707 11.293l-7-7A1 1 0 0 0 13 5v3H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10v3a1 1 0 0 0 1.707.707l7-7a1 1 0 0 0 0-1.414zM15 16.586V15a1 1 0 0 0-1-1H4v-4h10a1 1 0 0 0 1-1V7.414L19.586 12z"/>
                </g>
            </g>
        </g>

        <!-- Connection 3: user to email -->
        <g class="connection" id="connectorEmailGroup">
            <path class="connectorPath" fill="none" stroke="rgb(238, 155, 53)" stroke-width="3" stroke-linecap="round"/>
            <circle class="startSocket" r="5" fill="rgb(238, 155, 53)" />
            <g class="endSocket" fill="rgb(238, 155, 53)">
                <g transform="scale(1) translate(-12, -12)">
                    <path d="M21.707 11.293l-7-7A1 1 0 0 0 13 5v3H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10v3a1 1 0 0 0 1.707.707l7-7a1 1 0 0 0 0-1.414zM15 16.586V15a1 1 0 0 0-1-1H4v-4h10a1 1 0 0 0 1-1V7.414L19.586 12z"/>
                </g>
            </g>
        </g>

        <!-- Connection 4: user to login -->
        <g class="connection" id="connectorLoginGroup">
            <path class="connectorPath" fill="none" stroke="#4e73df" stroke-width="3" stroke-linecap="round"/>
            <circle class="startSocket" r="5" fill="#4e73df" />
            <g class="endSocket" fill="#4e73df">
                <g transform="scale(1) translate(-12, -12)">
                    <path d="M21.707 11.293l-7-7A1 1 0 0 0 13 5v3H3a1 1 0 0 0-1 1v6a1 1 0 0 0 1 1h10v3a1 1 0 0 0 1.707.707l7-7a1 1 0 0 0 0-1.414zM15 16.586V15a1 1 0 0 0-1-1H4v-4h10a1 1 0 0 0 1-1V7.414L19.586 12z"/>
                </g>
            </g>
        </g>
    </svg>
    <div class="database-wrapper" style="left: 22px; top: 0px;">
        <svg viewBox="0 0 128 128" id="mysql">
            <path fill="#00618A" d="M2.001 90.458h4.108v-16.223l6.36 14.143c.75 1.712 1.777 2.317 3.792 2.317s3.003-.605 3.753-2.317l6.36-14.143v16.223h4.108v-16.196c0-1.58-.632-2.345-1.936-2.739-3.121-.974-5.215-.131-6.163 1.976l-6.241 13.958-6.043-13.959c-.909-2.106-3.042-2.949-6.163-1.976-1.304.395-1.936 1.159-1.936 2.739v16.197zM33.899 77.252h4.107v8.938c-.038.485.156 1.625 2.406 1.661 1.148.018 8.862 0 8.934 0v-10.643h4.117c.019 0-.004 14.514-.004 14.574.022 3.58-4.441 4.357-6.499 4.417h-12.972v-2.764c.022 0 12.963.003 12.995-.001 2.645-.279 2.332-1.593 2.331-2.035v-1.078h-8.731c-4.062-.037-6.65-1.81-6.683-3.85-.002-.187.089-9.129-.001-9.219z"/>
            <path fill="#E48E00" d="M56.63 90.458h11.812c1.383 0 2.727-.289 3.793-.789 1.777-.816 2.646-1.922 2.646-3.372v-3.002c0-1.185-.987-2.292-2.923-3.028-1.027-.396-2.292-.605-3.517-.605h-4.978c-1.659 0-2.449-.5-2.646-1.606-.039-.132-.039-.237-.039-.369v-1.87c0-.105 0-.211.039-.342.197-.843.632-1.08 2.094-1.212l.395-.026h11.733v-2.738h-11.535c-1.659 0-2.528.105-3.318.342-2.449.764-3.517 1.975-3.517 4.082v2.396c0 1.844 2.095 3.424 5.61 3.793.396.025.79.053 1.185.053h4.267c.158 0 .316 0 .435.025 1.304.105 1.856.343 2.252.816.237.237.315.475.315.737v2.397c0 .289-.197.658-.592.974-.355.316-.948.527-1.738.58l-.435.026h-11.338v2.738zM100.511 85.692c0 2.817 2.094 4.397 6.32 4.714.395.026.79.052 1.185.052h10.706v-2.738h-10.784c-2.41 0-3.318-.606-3.318-2.055v-14.168h-4.108v14.195zM77.503 85.834v-9.765c0-2.48 1.742-3.985 5.186-4.46.356-.053.753-.079 1.108-.079h7.799c.396 0 .752.026 1.147.079 3.444.475 5.187 1.979 5.187 4.46v9.765c0 2.014-.74 3.09-2.445 3.792l4.048 3.653h-4.771l-3.274-2.956-3.296.209h-4.395c-.752 0-1.543-.105-2.414-.343-2.613-.712-3.88-2.085-3.88-4.355zm4.434-.237c0 .132.039.265.079.423.237 1.135 1.307 1.768 2.929 1.768h3.732l-3.428-3.095h4.771l2.989 2.7c.552-.295.914-.743 1.041-1.32.039-.132.039-.264.039-.396v-9.368c0-.105 0-.238-.039-.37-.238-1.056-1.307-1.662-2.89-1.662h-6.216c-1.82 0-3.008.792-3.008 2.032v9.288z"/>
            <path fill="#00618A" d="M122.336 66.952c-2.525-.069-4.454.166-6.104.861-.469.198-1.216.203-1.292.79.257.271.297.674.502 1.006.394.637 1.059 1.491 1.652 1.938.647.489 1.315 1.013 2.011 1.437 1.235.754 2.615 1.184 3.806 1.938.701.446 1.397 1.006 2.082 1.509.339.247.565.634 1.006.789v-.071c-.231-.294-.291-.698-.503-1.006l-.934-.934c-.913-1.212-2.071-2.275-3.304-3.159-.982-.705-3.18-1.658-3.59-2.801l-.072-.071c.696-.079 1.512-.331 2.154-.503 1.08-.29 2.045-.215 3.16-.503l1.508-.432v-.286c-.563-.578-.966-1.344-1.58-1.867-1.607-1.369-3.363-2.737-5.17-3.879-1.002-.632-2.241-1.043-3.304-1.579-.356-.181-.984-.274-1.221-.575-.559-.711-.862-1.612-1.293-2.441-.9-1.735-1.786-3.631-2.585-5.458-.544-1.245-.9-2.473-1.579-3.59-3.261-5.361-6.771-8.597-12.208-11.777-1.157-.677-2.55-.943-4.021-1.292l-2.37-.144c-.481-.201-.983-.791-1.436-1.077-1.802-1.138-6.422-3.613-7.756-.358-.842 2.054 1.26 4.058 2.011 5.099.527.73 1.203 1.548 1.58 2.369.248.54.29 1.081.503 1.652.521 1.406.976 2.937 1.651 4.236.341.658.718 1.351 1.149 1.939.264.36.718.52.789 1.077-.443.62-.469 1.584-.718 2.369-1.122 3.539-.699 7.938.934 10.557.501.805 1.681 2.529 3.303 1.867 1.419-.578 1.103-2.369 1.509-3.95.092-.357.035-.621.215-.861v.072l1.293 2.585c.957 1.541 2.654 3.15 4.093 4.237.746.563 1.334 1.538 2.298 1.867v-.073h-.071c-.188-.291-.479-.411-.719-.646-.562-.551-1.187-1.235-1.651-1.867-1.309-1.776-2.465-3.721-3.519-5.745-.503-.966-.94-2.032-1.364-3.016-.164-.379-.162-.953-.502-1.148-.466.72-1.149 1.303-1.509 2.154-.574 1.36-.648 3.019-.861 4.739l-.144.071c-1.001-.241-1.352-1.271-1.724-2.154-.94-2.233-1.115-5.83-.287-8.401.214-.666 1.181-2.761.789-3.376-.187-.613-.804-.967-1.148-1.437-.427-.579-.854-1.341-1.149-2.011-.77-1.741-1.129-3.696-1.938-5.457-.388-.842-1.042-1.693-1.58-2.441-.595-.83-1.262-1.44-1.724-2.442-.164-.356-.387-.927-.144-1.293.077-.247.188-.35.432-.431.416-.321 1.576.107 2.01.287 1.152.479 2.113.934 3.089 1.58.468.311.941.911 1.508 1.077h.646c1.011.232 2.144.071 3.088.358 1.67.508 3.166 1.297 4.524 2.155 4.139 2.614 7.522 6.334 9.838 10.772.372.715.534 1.396.861 2.154.662 1.528 1.496 3.101 2.154 4.596.657 1.491 1.298 2.996 2.227 4.237.488.652 2.374 1.002 3.231 1.364.601.254 1.585.519 2.154.861 1.087.656 2.141 1.437 3.16 2.155.509.362 2.076 1.149 2.154 1.798zM90.237 39.593c-.526-.01-.899.058-1.293.144v.071h.072c.251.517.694.849 1.005 1.293l.719 1.508.071-.071c.445-.313.648-.814.646-1.58-.179-.188-.205-.423-.359-.646-.204-.3-.602-.468-.861-.719z"/>
        </svg>
        <svg style="display:none">
            <symbol id="my" viewBox="0 0 61 82" fill="#fff" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round">
                <g fill="#0072c6" stroke="none">
                    <path d="M0 10.93v58.141C0 75.106 13.432 80 30 80V10.93H0z"/>
                    <path d="M29.59 79.999h.41c16.568 0 30-4.891 30-10.93V10.93H29.59v69.069z" opacity=".65"/>
                </g>
                <path d="M60 10.93c0 6.037-13.432 10.93-30 10.93S0 16.965 0 10.93 13.432 0 30 0s30 4.893 30 10.93" stroke="none"/>
                <path d="M53.866 10.301c0 3.986-10.686 7.211-23.866 7.211S6.133 14.285 6.133 10.301 16.819 3.09 30 3.09s23.866 3.227 23.866 7.211" fill="#dd5900" stroke="none"/>
                <path d="M48.867 14.706c3.125-1.219 5.002-2.745 5.002-4.403 0-3.986-10.686-7.213-23.867-7.213S6.136 6.319 6.136 10.303c0 1.658 1.877 3.184 5.002 4.403 4.361-1.704 11.179-2.803 18.862-2.803s14.5 1.099 18.867 2.803" fill="#ff8c00" stroke="none"/>
            </symbol>
        </svg>
        <div class="svg-container" id="server">
            <svg class="sql-3d" width="30" height="40" viewBox="0 0 61 82">
                <use xlink:href="#my" />
            </svg>
        </div>
    </div>
    <div class="--database" id="database" style="left: 200px; top: -2px;">
        <svg width="40" height="42" viewBox="0 0 61 81" fill="#fff" fill-rule="evenodd" stroke="#000" stroke-linecap="round" stroke-linejoin="round"><use xlink:href="#A" x=".5" y=".5"/><symbol id="A" overflow="visible"><g stroke="none"><path d="M0 10.929V69.07C0 75.106 13.432 80 30 80V10.929H0z" fill="#3999c6"/><path d="M29.589 79.999h.412c16.568 0 30-4.891 30-10.929v-58.14H29.589v69.07z" fill="#59b4d9"/><path d="M60 10.929c0 6.036-13.432 10.929-30 10.929S0 16.965 0 10.929 13.432 0 30 0s30 4.893 30 10.929"/><path d="M53.867 10.299c0 3.985-10.686 7.211-23.867 7.211S6.132 14.284 6.132 10.299 16.819 3.088 30 3.088s23.867 3.228 23.867 7.211" fill="#7fba00"/><path d="M48.867 14.707c3.124-1.219 5.002-2.745 5.002-4.403 0-3.985-10.686-7.213-23.868-7.213S6.134 6.318 6.134 10.303c0 1.658 1.877 3.185 5.002 4.403 4.363-1.703 11.182-2.803 18.865-2.803s14.5 1.1 18.866 2.803" fill="#b8d432"/><path d="M49.389 58.071c-1.605 1.346-3.78 2.022-6.607 2.022h-9.428V35.358h8.943c2.816 0 4.973.517 6.457 1.588 1.389 1.005 2.086 2.41 2.086 4.205 0 1.431-.507 2.648-1.543 3.719-.882.885-1.942 1.497-3.248 1.856v.058c1.753.217 3.184.889 4.25 2.017.997 1.071 1.511 2.384 1.511 3.903.007 2.262-.813 4.033-2.42 5.366m-22.977-1.457c-2.359 2.322-5.544 3.479-9.519 3.479H8.19V35.358h8.704c8.731 0 13.098 3.998 13.098 12.043 0 3.846-1.181 6.925-3.579 9.213"/><path d="M16.439 39.873h-2.727v15.704h2.759c2.425 0 4.304-.763 5.695-2.227 1.332-1.463 2.006-3.415 2.006-5.883 0-2.317-.674-4.143-1.975-5.495-1.365-1.397-3.275-2.099-5.757-2.099" fill="#3999c6"/><path d="M43.993 44.483c.666-.583.999-1.346.999-2.293 0-1.834-1.332-2.747-4.033-2.747h-2.084v5.86h2.454c1.122 0 2.031-.282 2.665-.821m.909 5.817c-.73-.546-1.722-.853-3.004-.853h-3.03v6.524h3.001c1.276 0 2.303-.304 3.062-.914.696-.612 1.058-1.399 1.058-2.439.006-.977-.357-1.769-1.087-2.317" fill="#59b4d9"/></g></symbol></svg>
    </div>
    <div class="table-relation-wrapper" id="userTableWrapper" style="left: 50px; top: 50px;">
        <table id="userTable" style="border-collapse: collapse;box-sizing: border-box;">
            <thead>
                <tr>
                    <th class="table-heading ps-1" style="text-align:left;" colspan="2">
                        <svg width="20" height="20" fill="#3999c6" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg>
                        User Table
                    </th>
                </tr>
                <tr>
                    <th class="ps-2">ID</th>
                    <th class="ps-2">User</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">1</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Sumon</td>
                </tr>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">2</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Kamal</td>
                </tr>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">3</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Jamal</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-relation-wrapper" id="emailTableWrapper" style="left: 300px; top: 150px;">
        <table id="emailTable" style="border-collapse: collapse;box-sizing: border-box;">
            <thead>
                <tr>
                    <th class="table-heading ps-1" style="text-align:left;" colspan="2">
                        <svg width="20" height="20" fill="#7fba00" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg>
                        Email Table
                    </th>
                </tr>
                <tr>
                    <th class="ps-2">ID</th>
                    <th class="ps-2">Email</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">1</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Sumon@gmail.com</td>
                </tr>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">2</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Kamal@gmail.com</td>
                </tr>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">3</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Jamal@gmail.com</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="table-relation-wrapper" id="loginTableWrapper" style="left: 400px; top: 150px;">
        <table id="loginTable" style="border-collapse: collapse;box-sizing: border-box;">
            <thead>
                <tr>
                    <th class="table-heading ps-1" style="text-align:left;" colspan="2">
                        <svg width="20" height="20" fill="#7fba00" shape-rendering="geometricPrecision" text-rendering="geometricPrecision" image-rendering="optimizeQuality" fill-rule="evenodd" clip-rule="evenodd" viewBox="0 0 512 445.38"><path d="M6.95 0h498.1c3.82 0 6.95 3.16 6.95 6.92v96.5l-.02.46v341.5H0V88.11h.01L0 6.92C0 3.11 3.12 0 6.95 0zm11.57 315.78h104.12V219.6H18.52v96.18zm122.64 0h105.8V219.6h-105.8v96.18zm124.32 0h105.35V219.6H265.48v96.18zm123.87 0h104.12V219.6H389.35v96.18zm104.12 18.52H389.35v92.56h104.12V334.3zm-122.64 0H265.48v92.56h105.35V334.3zm-123.87 0h-105.8v92.56h105.8V334.3zm-124.32 0H18.52v92.56h104.12V334.3zM18.52 201.09h104.12v-94.46H18.52v94.46zm122.64 0h105.8v-94.46h-105.8v94.46zm124.32 0h105.35v-94.46H265.48v94.46zm123.87 0h104.12v-94.46H389.35v94.46z"/></svg>
                        Login Table
                    </th>
                </tr>
                <tr>
                    <th class="ps-2">ID</th>
                    <th class="ps-2">Login</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">1</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Sumon@gmail.com</td>
                </tr>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">2</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Kamal@gmail.com</td>
                </tr>
                <tr>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">3</td>
                    <td class="ps-2" style="color: #222;font-size: 12px;font-weight:500;">Jamal@gmail.com</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- <div class="row">
    <div class="col-xl-6">
        <svg id="svg" style="width: 100%; height: 400px; border: 1px solid #ccc;">
        <path id="resizablePath" d="" stroke="rgb(238, 155, 53)" fill="none" stroke-width="2" />
        <path id="startPoint" data-rotation="-90" transform="translate(100,100) rotate(-90)" style="cursor: pointer; fill: darkorange;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
        <path id="endPoint" data-rotation="90" transform="translate(300,200) rotate(90)" style="cursor: pointer; fill:darkorange;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
        </svg>
    </div>
    <div class="col-xl-6">
        <svg id="svgDemo" style="width: 100%; height: 400px; border: 1px solid #ccc;">
        <path id="resizablePathDemo" d="" stroke="#007BFF" fill="none" stroke-width="2" />
        <path id="startPointDemo" data-rotation="-90" transform="translate(100,100) rotate(-90)" style="cursor: pointer; fill: #007BFF;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
        <path id="endPointDemo" data-rotation="90" transform="translate(300,200) rotate(90)" style="cursor: pointer; fill: #007BFF;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
        </svg>
    </div>
</div> -->
@push('scripts')
<!-- Weekly and Monthly Line and Bar Chart -->
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisTooltipDayFormatePlugin, axisTooltipMonthFormatePlugin, axisCursorPlugin} from "/plugins/plugins-min.js";
    // Line Cahrt Initialize
    let userDayLogChart;
    // Line Bar Initialize
    let userMonthLogChart;
    // Define the current login,logout and activity data percentage (%)
    function fetch_current_users_activities_data() {
        $.ajax({
            type: "GET",
            url: "{{ route('user.activity')}}",
            dataType: 'json',
            success: function(response){
                
                const {
                    current_users, 
                    current_login_users, 
                    current_logout_users, 
                    total_current_users_activities_percentage,
                    login_current_users_activities_percentage,
                    logout_current_users_activities_percentage,
                    current_user_count_per_day,
                    labels,
                    data,
                    monthly_user_count_per_day,
                    message,
                } = response;

                if(message){
                    // Current total login, logout and activity data
                    $("#total_current_activites_records").text('');
                    $("#current_login_activites_records").text('');
                    $("#current_logout_activites_records").text('');
                }else{
                    // Current total login, logout and activity data
                    $("#total_current_activites_records").text(current_users);
                    $("#current_login_activites_records").text(current_login_users);
                    $("#current_logout_activites_records").text(current_logout_users);
                    // Current activity data percentage
                    $("#current_total_activites_percentage_records")
                        .attr("aria-valuenow", total_current_users_activities_percentage.toFixed(2))
                        .text(total_current_users_activities_percentage.toFixed(2) + "%");
                    // Current login data percentage
                    $("#current_login_activites_percentage_records")
                        .attr("aria-valuenow", login_current_users_activities_percentage.toFixed(2))
                        .text(login_current_users_activities_percentage.toFixed(2) + "%");
                    // Current logout data percentage
                    $("#current_logout_activites_percentage_records")
                        .attr("aria-valuenow", logout_current_users_activities_percentage.toFixed(2))
                        .text(logout_current_users_activities_percentage.toFixed(2) + "%");
    
                    // Update Week Log Chart
                    if (typeof userDayLogChart !== 'undefined' && userDayLogChart.data) {
                        userDayLogChart.data.labels = labels || [];
                        userDayLogChart.data.datasets[0].data = current_user_count_per_day.login_counts || [];
                        userDayLogChart.data.datasets[1].data = current_user_count_per_day.logout_counts || [];
                        userDayLogChart.data.datasets[2].data = current_user_count_per_day.current_user_counts || [];
                        userDayLogChart.update();
                    }
    
                    // Update Month Log Chart
                    if (typeof userMonthLogChart !== 'undefined' && userMonthLogChart.data) {
                        userMonthLogChart.data.datasets[0].data = monthly_user_count_per_day.login_counts || [];
                        userMonthLogChart.data.datasets[1].data = monthly_user_count_per_day.logout_counts || [];
                        userMonthLogChart.data.datasets[2].data = monthly_user_count_per_day.current_user_counts || [];
                        userMonthLogChart.update();
                    }
                    // Initialize the tooltip elements
                    $('[data-bs-toggle="tooltip"]').tooltip();

                }
            }
        });
    }
    // Current User Weekly Line Chart
    $(document).ready(function() {
        // Initialize the chart
        var ctx = document.getElementById("userDayLogChart").getContext('2d');

        // Create gradient for each dataset line
        var gradientLogin = ctx.createLinearGradient(0, 0, 0, 400);
        gradientLogin.addColorStop(0, 'rgba(34, 139, 34, 0.5)');  // darkgreen at top
        gradientLogin.addColorStop(1, 'rgba(34, 139, 34, 0)');    // transparent at bottom

        var gradientLogout = ctx.createLinearGradient(0, 0, 0, 400);
        gradientLogout.addColorStop(0, '#e74a3b');  // orange at top
        gradientLogout.addColorStop(1, 'rgba(255, 165, 0, 0)');    // transparent at bottom

        var gradientUsers = ctx.createLinearGradient(0, 0, 0, 400);
        gradientUsers.addColorStop(0, 'rgba(0, 0, 255, 0.5)');  // blue at top
        gradientUsers.addColorStop(1, 'rgba(0, 0, 255, 0)');    // transparent at bottom

        // Pointer Design rectangle candle
        function createCandlePointStyle(color = 'black') {
            const canvas = document.createElement('canvas');
            canvas.width = 20;  // wider
            canvas.height = 40; // taller
            const ctx = canvas.getContext('2d');

            // Draw wick (centered)
            ctx.beginPath();
            ctx.moveTo(canvas.width / 2, 0);
            ctx.lineTo(canvas.width / 2, canvas.height);
            ctx.strokeStyle = color;
            ctx.lineWidth = 2;
            ctx.stroke();

            // Draw body (rectangle candle)
            const bodyWidth = 8;
            const bodyHeight = 20;
            const bodyX = (canvas.width - bodyWidth) / 2;
            const bodyY = (canvas.height - bodyHeight) / 2;

            ctx.fillStyle = color;
            ctx.fillRect(bodyX, bodyY, bodyWidth, bodyHeight);

            return canvas;
        }
        
        userDayLogChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels: ['Sat', 'Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
                datasets: [{
                    label: "Login",
                    data: [], // Placeholder for Current login data (weekly)
                    borderColor: "darkgreen",
                    backgroundColor: gradientLogin,
                    borderWidth: 1,
                    fill: false,
                    tension: 0.4,
                    pointStyle: createCandlePointStyle('darkgreen'),
                    pointBackgroundColor: "darkgreen",
                }, {
                    label: "Logout",
                    data: [], // Placeholder for Current Logout Activity data (weekly)
                    borderColor: '#e74a3b',
                    backgroundColor: gradientLogout,
                    borderWidth: 1,
                    fill: false, 
                    tension: 0.4,
                    pointStyle: createCandlePointStyle('#e74a3b'),
                    pointBackgroundColor: "#e74a3b",
                }, {
                    label: "Users Activity",
                    data: [], // Placeholder for Current Activity Users data (weekly)
                    borderColor: "blue",
                    backgroundColor: gradientUsers,
                    borderWidth: 1,
                    fill: false,
                    tension: 0.4,
                    pointStyle: createCandlePointStyle('blue'),
                    pointBackgroundColor: "blue",
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#000',
                            font: {
                                size: 11,
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        },
                        // onHover: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'pointer';
                        // },
                        // onLeave: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'default';
                        // }
                    },
                    tooltip: {
                        enabled: true,
                        // backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        // titleColor: '#fff',
                        // bodyColor: '#fff',
                        backgroundColor: 'rgb(255, 255, 255)',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                        borderWidth: 1,
                        borderColor:'rgba(2, 149, 168, 0.6)',
                        titleFont: { size: 11 },
                        bodyFont: { size: 11 },
                        fontWeight: 'bold'
                    }
                },
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            color: 'rgba(0, 0, 0, 0.1)',
                        },
                        ticks: {
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        },
                    },
                    y: {
                        grid: {
                            display: false,
                            color: 'silver',
                        },
                        ticks: {
                            beginAtZero: true,
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutBounce'
                }
            },
            // import plugins
            plugins: [
                hoverGridPlugin(), 
                dottedGridPlugin(), 
                axisTooltipDayFormatePlugin(), 
                axisCursorPlugin(), 
            ]
        });
        fetch_current_users_activities_data();
    });
    // Current User Monthly Bar Chart
    $(document).ready(function() {
        // Initialize the chart
        var monthUserCtx = document.getElementById("userMonthLogChart").getContext('2d');

        // Create gradient for each dataset line
        var gradientLogin = monthUserCtx.createLinearGradient(0, 0, 0, 400);
        gradientLogin.addColorStop(0, 'rgba(34, 139, 34, 0.5)');  // darkgreen at top
        gradientLogin.addColorStop(1, 'rgba(34, 139, 34, 0)');    // transparent at bottom

        var gradientLogout = monthUserCtx.createLinearGradient(0, 0, 0, 400);
        gradientLogout.addColorStop(0, '#e74a3b');  // orange at top
        gradientLogout.addColorStop(1, 'rgba(255, 165, 0, 0)');    // transparent at bottom

        var gradientUsers = monthUserCtx.createLinearGradient(0, 0, 0, 400);
        gradientUsers.addColorStop(0, 'rgba(0, 0, 255, 0.5)');  // blue at top
        gradientUsers.addColorStop(1, 'rgba(0, 0, 255, 0)');    // transparent at bottom

        userMonthLogChart = new Chart(monthUserCtx, {
            type: 'bar',
            data: {
                labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                datasets: [{
                    label: "Login",
                    data: [], // Placeholder for Current login data
                    borderColor: "darkgreen",
                    backgroundColor: gradientLogin,
                    //borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointStyle: 'rectRounded',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "darkgreen",
                }, {
                    label: "Logout",
                    data: [], // Placeholder for Current Logout Activity data
                    borderColor: '#e74a3b',
                    backgroundColor: gradientLogout,
                    //borderWidth: 2,
                    fill: true, 
                    tension: 0.4,
                    pointStyle: 'triangle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "#e74a3b",
                }, {
                    label: "Users Activity",
                    data: [], // Placeholder for current user data
                    borderColor: "blue",
                    backgroundColor: gradientUsers,
                    //borderWidth: 2,
                    fill: true,
                    tension: 0.4,
                    pointStyle: 'circle',
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "blue",
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        labels: {
                            color: '#000',
                            font: {
                                size: 11,
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        },
                        // onHover: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'pointer';
                        // },
                        // onLeave: function(event, legendItem, legend) {
                        //     legend.chart.canvas.style.cursor = 'default';
                        // }
                    },
                    tooltip: {
                        enabled: true,
                        // backgroundColor: 'rgba(0, 0, 0, 0.7)',
                        // titleColor: '#fff',
                        // bodyColor: '#fff',
                        backgroundColor: 'rgb(255, 255, 255)',
                        titleColor: '#000000',
                        bodyColor: '#000000',
                        borderWidth: 1,
                        borderColor:'rgba(2, 149, 168, 0.6)',
                        titleFont: { size: 11 },
                        bodyFont: { size: 11 },
                        fontWeight: 'bold'
                    }
                },
                // tooltip interaction
                interaction: {
                    mode: 'index',
                    intersect: false
                },
                scales: {
                    x: {
                        grid: {
                            display: false,
                            color: 'rgba(0, 0, 0, 0.1)',
                        },
                        ticks: {
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        }
                    },
                    y: {
                        grid: {
                            display: false,
                            color: 'silver',
                        },
                        ticks: {
                            beginAtZero: true,
                            color: '#111',
                            font: {
                                size: 11, 
                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                weight: 'bold',
                            }
                        }
                    }
                },
                animation: {
                    duration: 1500,
                    easing: 'easeInOutBounce',
                },
            },
            // import plugins
            plugins: [
                hoverGridPlugin(), 
                dottedGridPlugin(), 
                axisTooltipMonthFormatePlugin(), 
                axisCursorPlugin(), 
            ]
        });
        fetch_current_users_activities_data();
    });
</script>
<!-- Total User Activity Multi-Chart -->
<script type="module">
    // hover plugins
    import { hoverGridPlugin, dottedGridPlugin, axisTooltipDateFormatePlugin, axisCursorPlugin } from "/plugins/plugins-min.js";
    // scroll plugins
    import { ChartScrollPlugin } from "/plugins/chartScrollPlugin.js";
    // debounce for ajax request too data loading maintain            
    function debounce(func, wait) {
        let timeout;
        return function (...args) {
            clearTimeout(timeout);
            timeout = setTimeout(() => func.apply(this, args), wait);
        };
    }
    // Extend Date prototype to get the day of the year (1–365/366)
    Date.prototype.getDayOfYear = function () {
        const start = new Date(this.getFullYear(), 0, 0);
        const diff = this - start;
        const oneDay = 1000 * 60 * 60 * 24;
        return Math.floor(diff / oneDay);
    };

    let chart; // Declare outside to update globally
    let chartDate;

    $(document).ready(function () {
        function analyticalChartFetch() {
            const start = $("#chartStartDate").val();
            const end = $("#chartEndDate").val();

            $.ajax({
                type: 'GET',
                url: "{{ route('user.analytical_chart') }}",
                dataType: 'json',
                data: {
                    start_date: start,
                    end_date: end
                },
                success: function (response) {
                    const messages = response.message;
                    if(messages){
                        $("show_messg").text(messages);
                    }else{

                        const labels = response.labels;
                        const data = response.monthly_user_count_per_day;
    
                        const date_labels = response.date_labels;
                        const date_data = response.monthly_user_count_per_date;
                        
    
                        if (chart) chart.destroy(); // Clean existing chart
                        if (chartDate) chartDate.destroy();
    
                        const ctx = document.getElementById('userAllLogChart').getContext('2d');
                        const ctxDateChart = document.getElementById('allUserDateLogChart').getContext('2d');
    
                        // Create gradients
                        const gradientLogin = ctx.createLinearGradient(0, 0, 0, 400);
                        gradientLogin.addColorStop(0, 'rgba(28,200,138,0.5)');
                        gradientLogin.addColorStop(1, 'rgba(34,139,34,0)');
    
                        const gradientLogout = ctx.createLinearGradient(0, 0, 0, 400);
                        gradientLogout.addColorStop(0, '#e74a3b');
                        gradientLogout.addColorStop(1, 'rgba(255,165,0,0)');
    
                        const gradientUsers = ctx.createLinearGradient(0, 0, 0, 400);
                        gradientUsers.addColorStop(0, 'rgba(0, 123, 255, 0.2)');
                        gradientUsers.addColorStop(1, 'rgba(0,0,255,0)');
    
                        // Pointer Design rectangle candle
                        function createCandlePointStyle(color = 'black') {
                            const canvas = document.createElement('canvas');
                            canvas.width = 20;  // wider
                            canvas.height = 40; // taller
                            const ctx = canvas.getContext('2d');
    
                            // Draw wick (centered)
                            ctx.beginPath();
                            ctx.moveTo(canvas.width / 2, 0);
                            ctx.lineTo(canvas.width / 2, canvas.height);
                            ctx.strokeStyle = color;
                            ctx.lineWidth = 2;
                            ctx.stroke();
    
                            // Draw body (rectangle candle)
                            const bodyWidth = 8;
                            const bodyHeight = 20;
                            const bodyX = (canvas.width - bodyWidth) / 2;
                            const bodyY = (canvas.height - bodyHeight) / 2;
    
                            ctx.fillStyle = color;
                            ctx.fillRect(bodyX, bodyY, bodyWidth, bodyHeight);
    
                            return canvas;
                        }
                        
                        // Montly Basis Data Line Chart
                        chart = new Chart(ctx, {
                            type: 'bar',
                            data: {
                                labels,
                                datasets: [
                                    {
                                        type: 'line',
                                        label: 'Login Count',
                                        data: data.login_counts,
                                        backgroundColor: gradientLogin,
                                        borderColor: 'rgb(0, 160, 101)',
                                        fill: true,
                                        tension: 0.4,
                                        borderWidth: 1,
                                        pointStyle: createCandlePointStyle('darkgreen'),
                                        pointHoverBackgroundColor: "darkgreen"
                                    },
                                    {
                                        type: 'line',
                                        label: 'Logout Count',
                                        data: data.logout_counts,
                                        backgroundColor: gradientLogout,
                                        borderColor: '#e74a3b',
                                        fill: true,
                                        tension: 0.4,
                                        borderWidth: 1,
                                        pointStyle: createCandlePointStyle('#e74a3b'),
                                        pointHoverBackgroundColor: "#e74a3b"
                                    },
                                    {
                                        type: 'line',
                                        label: 'Active Users',
                                        data: data.current_user_counts,
                                        backgroundColor: gradientUsers,
                                        borderColor: '#2259ff',
                                        fill: true,
                                        tension: 0.4,
                                        borderWidth: 1,
                                        pointStyle: createCandlePointStyle('#4e73df'),
                                        pointHoverBackgroundColor: "#4e73df"
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                // maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: true,
                                        position: 'top',
                                        labels: {
                                            color: '#000',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        },
                                        // onHover(event, item, legend) {
                                        //     legend.chart.canvas.style.cursor = 'pointer'; // ew-resize
                                        // },
                                        // onLeave(event, item, legend) {
                                        //     legend.chart.canvas.style.cursor = 'default';
                                        // }
                                    },
                                    tooltip: {
                                        enabled: true,
                                        backgroundColor: 'rgb(255, 255, 255)',
                                        titleColor: '#000000',
                                        bodyColor: '#000000',
                                        borderWidth: 1,
                                        borderColor:'rgba(2, 149, 168, 0.6)',
                                        titleFont: { size: 11 },
                                        bodyFont: { size: 11 },
                                        fontWeight: 'bold'
                                    },
                                    zoom: {
                                        pan: {
                                            enabled: true,
                                            mode: 'x',
                                            threshold: 10
                                        },
                                        zoom: {
                                            wheel: {
                                                enabled: true
                                            },
                                            pinch: {
                                                enabled: true
                                            },
                                            mode: 'x'
                                        }
                                    }
                                },
                                interaction: {
                                    mode: 'index',
                                    intersect: false
                                },
                                scales: {
                                    x: {
                                        grid: { display: false, color: 'rgb(255, 255, 255)' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            },
                                            // x-label rotation change 
                                            // autoSkip: false,
                                            // maxRotation: 45,
                                            // minRotation: 0
                                            type: 'time',
                                            time: {
                                                unit: 'day',
                                                tooltipFormat: 'dd MMM yyyy',
                                                displayFormats: {
                                                    day: 'dd MMM yyyy'
                                                }
                                            },
                                        }   
                                    },
                                    y: {
                                        beginAtZero: true,
                                        grid: { display: false, color: 'rgb(255, 255, 255)' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            //stepSize: 1,
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        }
                                    }
                                }
                            },
                            plugins: [
                                hoverGridPlugin(),
                                dottedGridPlugin(),
                                axisTooltipDateFormatePlugin(),
                                ChartScrollPlugin(),
                                ChartZoom,
                                axisCursorPlugin()
                            ]
                        });
    
                        // Date Basis Data Bar Chart
                        chartDate = new Chart(ctxDateChart, {
                            type: 'bar',
                            data: {
                                labels: date_labels,
                                datasets: [
                                    {
                                        type: 'bar',
                                        label: 'Login Count',
                                        data: date_data.date_login_counts,
                                        backgroundColor: 'rgba(28,200,138,0.5)',
                                        fill: true,
                                        tension: 0.4,
                                        order: 3
                                    },
                                    {
                                        type: 'bar',
                                        label: 'Logout Count',
                                        data: date_data.date_logout_counts,
                                        backgroundColor: '#e74a3b',
                                        fill: true,
                                        tension: 0.4,
                                        order: 2
                                    },
                                    {
                                        type: 'bar',
                                        label: 'Active Users',
                                        data: date_data.date_current_user_counts,
                                        backgroundColor: '#4e73df',
                                        fill: true,
                                        tension: 0.4,
                                        order: 1
                                    }
                                ]
                            },
                            options: {
                                responsive: true,
                                // maintainAspectRatio: false,
                                plugins: {
                                    legend: {
                                        display: false,
                                        position: 'top',
                                        labels: {
                                            color: '#000',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        }
                                    },
                                    tooltip: {
                                        enabled: true,
                                        backgroundColor: 'rgb(255, 255, 255)',
                                        titleColor: '#000000',
                                        bodyColor: '#000000',
                                        borderWidth: 1,
                                        borderColor:'rgba(2, 149, 168, 0.6)',
                                        titleFont: { size: 11 },
                                        bodyFont: { size: 11 },
                                        fontWeight: 'bold'
                                    },
                                    zoom: {
                                        pan: {
                                            enabled: true,
                                            mode: 'x',
                                            threshold: 10
                                        },
                                        zoom: {
                                            wheel: {
                                                enabled: true
                                            },
                                            pinch: {
                                                enabled: true
                                            },
                                            mode: 'x'
                                        }
                                    }
                                },
                                interaction: {
                                    mode: 'index',
                                    intersect: false
                                },
                                scales: {
                                    x: {
                                        grid: { display: false, color: 'silver' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            //stepSize: 1,
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            },
                                            // x-label rotation change 
                                            // autoSkip: false,
                                            // maxRotation: 45,
                                            // minRotation: 0
                                            type: 'time',
                                            time: {
                                                unit: 'day',
                                                tooltipFormat: 'dd MMM yyyy',
                                                displayFormats: {
                                                    day: 'dd MMM yyyy'
                                                }
                                            },
                                        }   
                                    },
                                    y: {
                                        beginAtZero: true,
                                        grid: { display: true, color: 'silver' },
                                        ticks: {
                                            source: 'data',
                                            autoSkip: true,
                                            color: '#111',
                                            font: {
                                                size: 11,
                                                family: "Roboto, Noto Sans, Noto Sans JP, Noto Sans KR, Noto Naskh Arabic, Noto Sans Thai, Noto Sans Hebrew, Noto Sans Bengali, sans-serif",
                                                weight: 'bold'
                                            }
                                        }
                                    }
                                }
                            },
                            plugins: [
                                hoverGridPlugin(),
                                dottedGridPlugin(),
                                axisTooltipDateFormatePlugin(),
                                ChartScrollPlugin(),
                                ChartZoom,
                                axisCursorPlugin()
                            ]
                        });
                    }
                }
            });
        }
        analyticalChartFetch();
        // input range id initialize
        const sliderLeft = document.getElementById('rangeLeftSlider');
        const sliderRight = document.getElementById('rangeRightSlider');
        const startInput = document.getElementById('chartStartDate');
        const endInput = document.getElementById('chartEndDate');

        const today = new Date();
        const currentYear = today.getFullYear();
        const baseStartDate = new Date(currentYear, 0, 1); // Jan 1 current year
        const diffInMs = today - baseStartDate;
        const offsetInDays = Math.floor(diffInMs / (1000 * 60 * 60 * 24));

        sliderRight.value = offsetInDays;

        // Helper to format DD-MM-YYYY
        function formatDate(date) {
            const day = String(date.getDate()).padStart(2, '0');
            const monthNames = ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"];
            const month = monthNames[date.getMonth()];
            const year = date.getFullYear();
            return `${day}-${month}-${year}`;
        }
        // bckground change according to range
        function updateDateInputs() {
            const fromOffset = parseInt(sliderLeft.value);
            const toOffset = parseInt(sliderRight.value);

            // Start Date
            const fromDate = new Date(baseStartDate);
            fromDate.setDate(baseStartDate.getDate() + fromOffset);
            // fromDate.setDate(baseStartDate.getDate() + fromOffset - 1);

            // Current End Date
            const toDate = new Date(baseStartDate);
            // toDate.setDate(baseStartDate.getDate() + toOffset);
            toDate.setDate(baseStartDate.getDate() + toOffset - 1);

            startInput.value = formatDate(fromDate);
            endInput.value = formatDate(toDate);

            // Gradient split logic
            const min = parseInt(sliderLeft.min);
            const max = parseInt(sliderRight.max);
            const range = max - min;

            const leftPercent = ((fromOffset - min) / range) * 100;
            const rightPercent = ((toOffset - min) / range) * 100;

            // Left slider shows gradient to the right of the thumb
            sliderLeft.style.background = `linear-gradient(to right, 
                transparent ${leftPercent}%, 
                rgba(0, 123, 255, 0.1) ${leftPercent}%)`;

            // Right slider shows gradient to the left of the thumb
            sliderRight.style.background = `linear-gradient(to right, 
                rgba(0, 123, 255, 0.1) ${rightPercent}%, 
                transparent ${rightPercent}%)`;

            const leftTooltip = document.getElementById('leftTooltip');
            const rightTooltip = document.getElementById('rightTooltip');

            // Show percentage in tooltip
            // leftTooltip.textContent = `${leftPercent.toFixed(0)}%`;
            // rightTooltip.textContent = `${rightPercent.toFixed(0)}%`;

            // Show Date in tooltip
            leftTooltip.textContent = startInput.value;
            rightTooltip.textContent = endInput.value;

            positionTooltip(sliderLeft, leftTooltip);
            positionTooltip(sliderRight, rightTooltip);
        }
        // show tooltip input range
        function positionTooltip(slider, tooltip) {
            const sliderRect = slider.getBoundingClientRect();
            const tooltipWidth = tooltip.offsetWidth;
            const sliderWidth = slider.offsetWidth;
            const value = parseInt(slider.value);
            const min = parseInt(slider.min);
            const max = parseInt(slider.max);
            const percent = (value - min) / (max - min);

            const offset = percent * sliderWidth;
            const thumbOffset = offset - (tooltipWidth / 2);

            tooltip.style.left = `${thumbOffset}px`;
        }
        // debounce
        const debouncedFetch = debounce(() => {
            if (typeof analyticalChartFetch === 'function') analyticalChartFetch();
        }, 300);
        // input range left side
        sliderLeft.addEventListener('input', function () {
            if (parseInt(sliderLeft.value) >= parseInt(sliderRight.value)) {
                sliderLeft.value = parseInt(sliderRight.value) - 1;
            }
            updateDateInputs();
            debouncedFetch();
        });
        // input range right side
        sliderRight.addEventListener('input', function () {
            if (parseInt(sliderRight.value) <= parseInt(sliderLeft.value)) {
                sliderRight.value = parseInt(sliderLeft.value) + 1;
            }
            updateDateInputs();
            debouncedFetch();
        });
        // update data according date range
        $("#chartStartDate, #chartEndDate").on('change', function () {
            analyticalChartFetch();
        });
        // Initialize sliders on page load
        sliderLeft.value = 0;
        sliderRight.value = new Date().getDayOfYear();
        updateDateInputs();
    });
</script>
<!-- Date Range Scroll chart module-min-js /module-min-js-->
<script type="module">
    import { initializeCurveLineChart, initDragAndDrop } from "/module/module-min-js/design-helper-function-min.js";
    const dateRangeId = "cruveChart";

    // drag and drop default card
    const row = '.drag-row';
    const column = '.drag-column';
    const cardKey = '.group-card';
    const lineConnectionId = 'connectionLines';

    // DOM ready
    document.addEventListener('DOMContentLoaded', () => {
        initDragAndDrop(column, cardKey, row, lineConnectionId)
    });

    initializeCurveLineChart(dateRangeId);
</script>
<!-- Get Branch -->
 <script>
    $(document).ready(function(){
        branchInitFetch();
        roleInitFetch();
        emailInitFetch();
        // Branch Data Fetch
        function branchInitFetch(query = ''){
            const currentURL = "{{route('branch.fetch')}}"

            $.ajaxSetup({
                headers:{
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentURL,
                dataType: "json",
                data:{query},
                success: function(response) {
                    const branchData = response.branch_data;
                    const roleCounts = response.role_count_per_branch || {};
                    const branchMenu = $("#branchFetchData");

                    branchMenu.empty();
                    
                    // Check if no data found
                    if (!branchData || branchData.length === 0) {
                        branchMenu.append(`
                            <li id="errorPage">
                                ⚠️ No branch found !
                            </li>
                        `);
                    }else{
                        $.each(branchData, function(key, item) {
                            const branchId = item.branch_id;
                            const roleCount = roleCounts.hasOwnProperty(branchId) ? roleCounts[branchId] : 0;
                            branchMenu.append(`
                                <li class="select_list_branch" tabindex="0" data-value="${item.branch_id}" id="select_list_branch">
                                    ${item.branch_name}
                                    <label class="enter_press enter-focus">
                                        <svg width="24" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(0, 123, 255, 2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                                    </label>
                                    <span class="badge bg-dark-cornflowerblue rounded-pill bage_display_none" id="roleNum">
                                        Role : ${roleCount}
                                    </span>
                                </li>
                            `);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error);
                }
            });
        }
        // Branch Search
        $(document).on('keyup', '#searchBranch', function(){
            var query = $(this).val();
            const branchMenu = $("#branchFetchData");
            branchMenu.empty();
            branchMenu.append(`
                <li id="loaderPage">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-loader display_none"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>
                </li>
            `);
            $(".feather-loader").removeClass('display_none');
            $("#select_list_branch").addClass('add_display_none');
            setTimeout(() => {
               $(".feather-loader").addClass('display_none'); 
               $("#select_list_branch").removeClass('add_display_none');
            }, 1000);
            branchInitFetch(query);
        });
        // Branch Refresh
        $(document).on('click', '.enter_press', function(){
            branchInitFetch();
        });

        // Role Data Fetch
        function roleInitFetch(id, query = '') {
            if (!id) {
                return;
            }

            const currentUrl = "/application/get-fetch-role-data/" + id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                data:{query},
                success: function(response) {
                    const roleData = response.role_data;
                    const userCounts = response.user_count_per_role || {};
                    const roleMenu = $("#roleFetchData");

                    roleMenu.empty();
                    
                    // Check if no data found
                    if (!roleData || roleData.length === 0) {
                        roleMenu.append(`
                            <li id="errorPage">
                                ⚠️ No branch found !
                            </li>
                        `);
                    }else{
                        $.each(roleData, function(key, item) {
                            const roleId = item.id;
                            const userCount = userCounts.hasOwnProperty(roleId) ? userCounts[roleId] : 0;
                            roleMenu.append(`
                                <li tabindex="0" value="${item.id}" data-value="${item.id}" id="select_list_role">
                                    ${item.name}
                                    <span class="badge bg-dark-cornflowerblue rounded-pill bage_display_none" id="roleNum">
                                        Email : ${userCount}
                                    </span>
                                    <input type="checkbox" class="role-checkbox" data-id="${item.id}" data-value="${item.name}">
                                </li>
                            `);
                        });
                    }
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error);
                }
            });
        }
        // Role Search
        $(document).on('keyup', '#searchRole', function(){
            var query = $(this).val();
            const id = $('#selectedBranchId').val();
            const roleMenu = $("#roleFetchData");
            roleMenu.empty();

            roleMenu.append(`
                <li id="loaderPage">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="role-loader display_none"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>
                </li>
            `);
            $(".role-loader").removeClass('display_none');
            $("#select_list_role").addClass('add_display_none');
            setTimeout(() => {
               $(".role-loader").addClass('display_none'); 
               $("#select_list_role").removeClass('add_display_none');
            }, 1000);
            roleInitFetch(id, query);
        });
        // Role Refresh
        $(document).on('click', '.enter_press_option_role', function(){
            roleInitFetch();
        });
        // Handle Select Branch
        $(document).on('click', '#select_list_branch', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_list_role").empty();
                $("#select_list_role").empty();
                $("#select_list_role").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });
        // Event listener for only branch=>role active-line
        $(document).on('click', '#select_list_branch', function() {
            const isActive = $(this).hasClass("active-line");
            $("#searchBranch").val("");
            if (isActive) {
                $(this).removeClass("active-line");
                return;
            }
            
            $(this).addClass("active-line").siblings().removeClass("active-line");

            const id = $(this).data("value"); 
            const branchName = $(this).clone().children().remove().end().text().trim();
            $('#selectedBranchId').val(id);
            $("#head_info").text(branchName);
            $("#branhInfo").text(id);
            const roleMenu = $("#roleFetchData");
            roleMenu.empty();

            roleMenu.append(`
                <li id="loaderPage">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="role-loader display_none"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>
                </li>
            `);
            $(".role-loader").removeClass('display_none');
            $("#select_list_role").addClass('add_display_none');
            setTimeout(() => {
                $(".role-loader").addClass('display_none'); 
                $("#select_list_role").removeClass('add_display_none');
                if (id.length > 0) {
                    roleInitFetch(id);
                }
            }, 1000);
        });

        // Email Fetch Data
        function emailInitFetch(id, query = '') {
            if (!id) {
                return;
            }

            const currentUrl = "/application/get-user-fetch-email/" + id;

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type: "GET",
                url: currentUrl,
                dataType: 'json',
                data:{
                    role_ids: id,
                    query: $('#searchEmail').val()
                },
                success: function(response) {
                    const emailData = response.email_data || [];
                    const emailMenu = $("#emailFetchData");

                    emailMenu.empty();
                    
                    // Check if no data found
                    if (!emailData || emailData.length === 0) {
                        emailMenu.append(`
                            <li id="errorPage">
                                ⚠️ No branch found !
                            </li>
                        `);
                    }else{
                        $.each(emailData, function(key, item) {
                            emailMenu.append(`
                                <li tabindex="0" value="${item.id}" data-id="${item.id}" data-value="${item.login_email}" id="select_list_email" 
                                    data-bs-toggle="tooltip"  
                                    data-bs-placement="left" 
                                    title="<span style='height:40px;'>${item.name}</span>"
                                    data-bs-delay="100" 
                                    data-bs-html="true" 
                                    data-bs-boundary="window" 
                                    data-bs-template='<div class="tooltip" role="tooltip"><div class="tooltip-arrow"></div><div class="tooltip-inner bg-flora"></div>'>
                                    ${item.login_email}
                                    <label class="enter_press_option_email enter-focus">
                                        <svg width="24" height="20" viewBox="0 0 24 24" fill="none" stroke="rgba(0, 123, 255, 2)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link-2"><path d="M15 7h3a5 5 0 0 1 5 5 5 5 0 0 1-5 5h-3m-6 0H6a5 5 0 0 1-5-5 5 5 0 0 1 5-5h3"/><line x1="8" y1="12" x2="16" y2="12"/></svg>
                                    </label>
                                </li>
                            `);
                        });
                    }

                    // Tooltip (Bootstrap 5)
                    document.querySelectorAll('[data-bs-toggle="tooltip"]').forEach(el => {
                        new bootstrap.Tooltip(el);
                    });
                },
                error: function(xhr, status, error) {
                    console.error("AJAX error:", error);
                }
            });
        }
        // Email Search
        $(document).on('keyup', '#searchEmail', function(){
            const query = $(this).val();
            const selectedId = $('#selectedRoleId').val();
            const id = Array.isArray(selectedId) ? selectedId : [selectedId];

            const emailMenu = $("#emailFetchData");
            emailMenu.empty();

            emailMenu.append(`
                <li id="loaderPage">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="role-loader display_none"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>
                </li>
            `);
            $(".role-loader").removeClass('display_none');
            $("#select_list_email").addClass('add_display_none');
            setTimeout(() => {
                $(".role-loader").addClass('display_none'); 
                $("#select_list_email").removeClass('add_display_none');
            }, 1000);

            emailInitFetch(id, query);
        });
        // Email Refresh
        $(document).on('click', '.enter_press_option_email', function(){
            roleInitFetch();
        });
        // Handle Select Branch
        $(document).on('click', '#select_list_role', function() {
            var changeValue = $(this).val();
            if (changeValue === '') {
                $("#select_list_email").empty();
                $("#select_list_email").empty();
                $("#select_list_email").append('<option style="color:white;font-weight:600;" value="" disabled>Select district</option>');
            }
        });
        // Event listener for only branch=>role
        $(document).on('change', '.role-checkbox', function () {
            const id = [];
            const $parent = $(this).closest('#select_list_role');
            
            if ($(this).is(':checked')) {
                $parent.addClass('active-line');
            } else {
                $parent.removeClass('active-line');
            }
            $("#searchRole").val("");

            // Collect all checked role IDs
            $('.role-checkbox:checked').each(function () {
                id.push($(this).data('id'));
            });
            const selectedRoles = $('.role-checkbox:checked').map(function () {
                return $(this).data('value');
            }).get();

            let html = '';

            if (selectedRoles.length) {
                selectedRoles.forEach(role => {
                    html += `<li><span class="ms-1">Role: ${role}</span></li>`;
                });
            } else {
                html = '<span>No Role Selected</span>';
            }

            $('#roleInfo').html(html);
            $('#selectedRoleId').val(id);
            // Clear and show loader
            const emailMenu = $("#emailFetchData");
            emailMenu.empty().append(`
                <li id="loaderPage">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="email-loader display_none"><line x1="12" y1="2" x2="12" y2="6"/><line x1="12" y1="18" x2="12" y2="22"/><line x1="4.93" y1="4.93" x2="7.76" y2="7.76"/><line x1="16.24" y1="16.24" x2="19.07" y2="19.07"/><line x1="2" y1="12" x2="6" y2="12"/><line x1="18" y1="12" x2="22" y2="12"/><line x1="4.93" y1="19.07" x2="7.76" y2="16.24"/><line x1="16.24" y1="7.76" x2="19.07" y2="4.93"/></svg>
                </li>
            `);
            $(".email-loader").removeClass('display_none');
            $("#select_list_email").addClass('add_display_none');

            // Fetch emails after short delay
            setTimeout(() => {
                $(".email-loader").addClass('display_none');
                $("#select_list_email").removeClass('add_display_none');

                if (id.length > 0) {
                    emailInitFetch(id);
                }
            }, 1000);
        });
        // Event listener for only branch=>email
        $(document).on('click', '#select_list_email', function () {
            const id = [];

            $(this).toggleClass("active-line");
            $("#searchEmail").val("");

            $('#select_list_email.active-line').each(function () {
                id.push($(this).data('id'));
            });

            const selectedEmails = $('#select_list_email.active-line').map(function () {
                return $(this).data('value');
            }).get();

            let html = '';

            if (selectedEmails.length) {
                selectedEmails.forEach(email => {
                    html += `<li><span class="ms-1">${email}</span></li>`;
                });
            } else {
                html = '<span>No Email Selected</span>';
            }

            $('#emailInfo').html(html);
            $('#selectedEmailId').val(id);
        });

        // Branch Filter Enable Button
        $(document).on('click', '#enableBtnBranch', function(){
            $(".branch-check-point").attr('hidden', true);
            $("#branchSpin").removeAttr('hidden');
            $("#enableBtnBranch").addClass('display_none');
            $(".filex-show").removeClass('display_block');
            setTimeout(() => {
                $("#disableBtnBranch").removeAttr('hidden');
                $(".branch-check-point").removeAttr('hidden');
                $(".branch-disable-check-point").attr('hidden', true);
                $("#branchSpin").attr('hidden', true);
                $("#enableBtnBranch").removeClass('display_none');
                $("#branchDownloadBtn").removeAttr('hidden');
                $(".filex-show").addClass('display_block');
            }, 2000);
        });
        // Branch Filter Disable Button
        $(document).on('click', '#disableBtnBranch', function(){
            $(".branch-disable-check-point").attr('hidden', true);
            $("#disableBranchSpin").removeAttr('hidden');
            $("#disableBtnBranch").attr('hidden', true);
            $("#enableBtnBranch").attr('hidden', true);
            $("#branchDownloadBtn").attr('hidden', true);
            $(".filex-show").addClass('display_block');
            setTimeout(() => {
                $("#disableBtnBranch").removeAttr('hidden');
                $("#enableBtnBranch").removeAttr('hidden');
                $(".branch-disable-check-point").removeAttr('hidden');
                $("#disableBranchSpin").attr('hidden', true);
                $(".branch-check-point").attr('hidden', true);
                $(".filex-show").removeClass('display_block');
            }, 2000);
        });
        // Role Filter Enable Button
        $(document).on('click', '#enableBtnRole', function(){
            $(".role-check-point").attr('hidden', true);
            $("#roleSpin").removeAttr('hidden');
            $("#enableBtnRole").addClass('display_none');
            $(".filex-show").removeClass('display_block');
            setTimeout(() => {
                $("#disableBtnRole").removeAttr('hidden');
                $(".role-check-point").removeAttr('hidden');
                $(".role-check-disable-point").attr('hidden', true);
                $("#roleSpin").attr('hidden', true);
                $("#enableBtnRole").removeClass('display_none');
                $("#roleDownloadBtn").removeAttr('hidden');
                $(".filex-show").addClass('display_block');
            }, 2000);
        });
        // Role Filter Disable Button
        $(document).on('click', '#disableBtnRole', function(){
            $(".role-check-disable-point").attr('hidden', true);
            $("#disableRolechSpin").removeAttr('hidden');
            $("#disableBtnRole").attr('hidden', true);
            $("#enableBtnRole").attr('hidden', true);
            $("#roleDownloadBtn").attr('hidden', true);
            $(".filex-show").addClass('display_block');
            setTimeout(() => {
                $("#disableBtnRole").removeAttr('hidden');
                $("#enableBtnRole").removeAttr('hidden');
                $(".role-check-disable-point").removeAttr('hidden');
                $("#disableRolechSpin").attr('hidden', true);
                $(".role-check-point").attr('hidden', true);
                $(".filex-show").removeClass('display_block');
            }, 2000);
        });
        // Email Filter Enable Button
        $(document).on('click', '#enableBtnEmail', function(){
            $(".email-check-point").attr('hidden', true);
            $("#emailSpin").removeAttr('hidden');
            $("#enableBtnEmail").addClass('display_none');
            $(".filex-show").removeClass('display_block');
            setTimeout(() => {
                $("#disableBtnEmail").removeAttr('hidden');
                $(".email-check-point").removeAttr('hidden');
                $(".email-check-disable-point").attr('hidden', true);
                $("#emailSpin").attr('hidden', true);
                $("#enableBtnEmail").removeClass('display_none');
                $("#emailDownloadBtn").removeAttr('hidden');
                $(".filex-show").addClass('display_block');
            }, 2000);
        });
        // Email Filter Disable Button
        $(document).on('click', '#disableBtnEmail', function(){
            $(".email-check-disable-point").attr('hidden', true);
            $("#disableEmailSpin").removeAttr('hidden');
            $("#disableBtnEmail").attr('hidden', true);
            $("#enableBtnEmail").addClass('display_none');
            $("#emailDownloadBtn").attr('hidden', true);
            $(".filex-show").addClass('display_block');
            setTimeout(() => {
                $("#disableBtnEmail").removeAttr('hidden');
                $(".email-check-disable-point").removeAttr('hidden');
                $("#disableEmailSpin").attr('hidden', true);
                $(".email-check-point").attr('hidden', true);
                $("#enableBtnEmail").removeClass('display_none');
                $(".filex-show").removeClass('display_block');
            }, 2000);
        });
        // Show Branch Download Modal
        $(document).on('click', '#branchDownloadBtn,#roleDownloadBtn,#emailDownloadBtn', function(){
            $("#downloadModal").modal('show');

        });
        // Change to data format
        function convertToYMD(dateStr) {
            const months = {
                Jan: '01', Feb: '02', Mar: '03', Apr: '04',
                May: '05', Jun: '06', Jul: '07', Aug: '08',
                Sep: '09', Oct: '10', Nov: '11', Dec: '12'
            };

            const [day, mon, year] = dateStr.split('-');
            return `${year}-${months[mon]}-${day.padStart(2, '0')}`;
        }
        // PDF Download
        $(document).on('click', '#exportPdf', function(e){
            e.preventDefault();

            const start_date_raw = $("#chartStartDate").val();
            const end_date_raw = $("#chartEndDate").val(); 

            const start_date = convertToYMD(start_date_raw);
            const end_date = convertToYMD(end_date_raw); 

            const branch_id = $('#selectedBranchId').val();
            const role = $('#selectedRoleId').val() ? $('#selectedRoleId').val().split(',') : [];
            const email = $('#select_list_email.active-line').map(function () {
                return $(this).data('value');
            }).get();

            const url = '{{ route("pdf_session_data.fetch") }}?' +
                `start_date=${start_date}&end_date=${end_date}&branch_id=${branch_id}&role=${role}&email=${email}`;
    
            window.location.href = url;
        });
        // Excel Download
        $(document).on('click', '#exportExcel', function(e){
            e.preventDefault();

            const start_date_raw = $("#chartStartDate").val();
            const end_date_raw = $("#chartEndDate").val(); 

            const start_date = convertToYMD(start_date_raw);
            const end_date = convertToYMD(end_date_raw); 

            const branch_id = $('#selectedBranchId').val();
            const role = $('#selectedRoleId').val() ? $('#selectedRoleId').val().split(',') : [];
            const email = $('#select_list_email.active-line').map(function () {
                return $(this).data('value');
            }).get();

            const url = '{{ route("session-record_excel.action") }}?' +
                `start_date=${start_date}&end_date=${end_date}&branch_id=${branch_id}&role=${role}&email=${email}`;
    
            window.location.href = url;
        });
        // Excel CSV File Download
        $(document).on('click', '#exportExcelCsv', function(e){
            e.preventDefault();

            const start_date_raw = $("#chartStartDate").val();
            const end_date_raw = $("#chartEndDate").val(); 

            const start_date = convertToYMD(start_date_raw);
            const end_date = convertToYMD(end_date_raw); 

            const branch_id = $('#selectedBranchId').val();
            const role = $('#selectedRoleId').val() ? $('#selectedRoleId').val().split(',') : [];
            const email = $('#select_list_email.active-line').map(function () {
                return $(this).data('value');
            }).get();

            const url = '{{ route("session-record_cvs_file.action") }}?' +
                `start_date=${start_date}&end_date=${end_date}&branch_id=${branch_id}&role=${role}&email=${email}`;
    
            window.location.href = url;
        });
        // Get data for Print
        $(document).on('click', '#dataPrint', function (e) {
            e.preventDefault();
            
            const iframe = document.getElementById('printFrame');
            if (!iframe) {
                console.error("Iframe with ID 'printFrame' not found.");
                return;
            }

            const start_date_raw = $("#chartStartDate").val();
            const end_date_raw = $("#chartEndDate").val(); 
            const start_date = convertToYMD(start_date_raw);
            const end_date = convertToYMD(end_date_raw); 
            const branch_id = $('#selectedBranchId').val();
            const role = $('#selectedRoleId').val() ? $('#selectedRoleId').val().split(',') : [];
            const email = $('#select_list_email.active-line').map(function () {
                return $(this).data('value');
            }).get();

            const url = '{{ route("session-record.print") }}?' +
                `start_date=${start_date}&end_date=${end_date}&branch_id=${branch_id}&role=${role}&email=${email}`;

            fetch(url)
                .then(response => response.text())
                .then(data => {
                    const companyName = @json(setting('company_name'));
                    const companyAddress = @json(setting('company_address'));
                    const companyLogo = "{{ asset('image/log/print-page-logo.svg') }}";
                    
                    const doc = iframe.contentDocument || iframe.contentWindow.document;

                    // Dynamically inject logo image
                    let logoHTML = '';
                    if (companyLogo) {
                        logoHTML = `
                            <span style="float:inline-start;">
                                <img id="company-logo" src="${companyLogo}" 
                                    style="width:70px;height:55px;padding:0px;" 
                                    alt="company-logo">
                            </span>
                        `;
                    }

                    // Inject logo before full HTML write
                    const updatedData = data.replace('<div class="header">', `<div class="header">${logoHTML}`);

                    const html = `
                        <!DOCTYPE html>
                        <html>
                            <head>
                                <title>Print Preview</title>
                                <style>
                                    body {
                                        padding: 20px;
                                        font-family: Roboto,Noto Sans,Noto Sans JP,Noto Sans KR,Noto Naskh Arabic,Noto Sans Thai,Noto Sans Hebrew,Noto Sans Bengali,sans-serif;
                                    }
                                    p,span{
                                    font-family: Roboto,Noto Sans,Noto Sans JP,Noto Sans KR,Noto Naskh Arabic,Noto Sans Thai,Noto Sans Hebrew,Noto Sans Bengali,sans-serif;  
                                    }
                                    .header {
                                        text-align: center;
                                        margin-bottom: 0px;
                                    }
                                    .content {
                                        margin: 0px;
                                    }
                                    .footer {
                                        text-align: center;
                                        /* position: fixed;
                                        bottom: 0; */
                                        width: 100%;
                                    }
                                    table,tr,th,td {
                                        width: 100%;
                                        border-collapse: collapse;
                                        /* common-border : if the common border is stop then will start optional border 
                                            other wise will be continue common border. 
                                        */
                                        border: 1px solid lightgray;
                                    }
                                    th{
                                        background-color: rgb(239, 255, 255) !important;
                                        /* optional-border */
                                        border-top: 1px solid lightgray;
                                        border-bottom: 1px solid lightgray;
                                        padding: 2px;
                                        font-size:12px;
                                        color:black;
                                        width: 100%;
                                    }
                                    /* session table */
                                    .session-log-table {
                                        width: 100%;
                                        border-collapse: collapse;
                                        border: 1px solid lightgray;
                                        font-size: 12px;
                                        color: black;
                                        margin-top: 5px;
                                    }
                                    .session-log-table th,
                                    .session-log-table td {
                                        border: 1px solid lightgray;
                                        padding: 2px;
                                    }
                                    .session-log-table thead th {
                                        background-color: rgb(239, 255, 255);
                                        font-weight: 700;
                                    }
                                    /* Column widths */
                                    .session-log-table th:nth-child(1),
                                    .session-log-table td:nth-child(1) { width: 5%; text-align: center; }

                                    .session-log-table th:nth-child(2),
                                    .session-log-table td:nth-child(2) { width: 5%; text-align: center; }

                                    .session-log-table th:nth-child(3),
                                    .session-log-table td:nth-child(3) { width: 30%; text-align: left; }

                                    .session-log-table th:nth-child(4),
                                    .session-log-table td:nth-child(4),
                                    .session-log-table th:nth-child(5),
                                    .session-log-table td:nth-child(5) { width: 10%; text-align: left; }

                                    .session-log-table th:nth-child(6),
                                    .session-log-table td:nth-child(6),
                                    .session-log-table th:nth-child(7),
                                    .session-log-table td:nth-child(7) { width: 15%; text-align: left; }

                                    .session-log-table th:nth-child(8),
                                    .session-log-table td:nth-child(8) { width: 10%; text-align: left; }
                                    /* summary table */
                                    #session-modal-content .summary-table {
                                        width: 100%;
                                        border-collapse: collapse;
                                        border: 1px solid lightgray;
                                        font-size: 12px;
                                        color: black;
                                    }
                                    #session-modal-content .summary-table th,
                                    #session-modal-content .summary-table td {
                                        border: 1px solid lightgray;
                                        padding: 2px;
                                        text-align: center;
                                    }
                                    #session-modal-content .summary-table thead tr:nth-child(1) th {
                                        background-color: rgb(239, 255, 255);
                                        font-weight: 700;
                                        text-align: center;
                                    }
                                    #session-modal-content .summary-table th:nth-child(1),
                                    #session-modal-content .summary-table td:nth-child(1) {
                                        width: 10%;
                                    }

                                    #session-modal-content .summary-table th:nth-child(2),
                                    #session-modal-content .summary-table td:nth-child(2) {
                                        width: 60%;
                                        text-align: left;
                                    }
                                    #session-modal-content .summary-table th:nth-child(3),
                                    #session-modal-content .summary-table td:nth-child(3),
                                    #session-modal-content .summary-table th:nth-child(4),
                                    #session-modal-content .summary-table td:nth-child(4),
                                    #session-modal-content .summary-table th:nth-child(5),
                                    #session-modal-content .summary-table td:nth-child(5) {
                                        width: 10%;
                                    }
                                    /* branch table */
                                    .print-table-wrapper {
                                        display: inline-block;
                                        width: 40%;
                                        vertical-align: top;
                                    }
                                    .branch-summary-table {
                                        width: 100%;
                                        border: 1px solid lightgray;
                                        border-collapse: collapse;
                                        font-size: 12px;
                                        color: black;
                                    }
                                    .branch-summary-table th,
                                    .branch-summary-table td {
                                        border: 1px solid lightgray;
                                        padding: 2px;
                                        text-align: center;
                                    }
                                    .branch-summary-table thead tr:first-child th.heading {
                                        background-color: rgb(239, 255, 255);
                                        font-weight: 700;
                                        text-align: center;
                                    }
                                    .branch-summary-table thead tr:nth-child(2) th:nth-child(1),
                                    .branch-summary-table tbody tr td:nth-child(1) {
                                        width: 10%;
                                    }
                                    .branch-summary-table thead tr:nth-child(2) th:nth-child(2),
                                    .branch-summary-table tbody tr td:nth-child(2) {
                                        width: 30%;
                                        text-align: left;
                                    }
                                    .branch-summary-table thead tr:nth-child(2) th:nth-child(3),
                                    .branch-summary-table tbody tr td:nth-child(3),
                                    .branch-summary-table thead tr:nth-child(2) th:nth-child(4),
                                    .branch-summary-table tbody tr td:nth-child(4),
                                    .branch-summary-table thead tr:nth-child(2) th:nth-child(5),
                                    .branch-summary-table tbody tr td:nth-child(5) {
                                        width: 20%;
                                    }
                                    th #theadLeftBorder{
                                        /* optional-border */
                                        border-left: 1px solid lightgray;
                                    }
                                    th #theadRightBorder{
                                        /* optional-border */
                                        border-right:1px solid lightgray;
                                    }
                                    tr{
                                        /* optional-border */
                                        border: 1px solid lightgray;
                                        padding: 1px;
                                        font-size:12px;
                                        color:black;
                                        width: 100%;
                                    }
                                    td{
                                        padding: 2px;
                                        font-size:12px;
                                        color:black;
                                        width: 100%; 
                                    }
                                    @media print {
                                        .print-watermark-text {
                                            display:block;
                                            position: fixed;
                                            top: 50%;
                                            left: 40%;
                                            transform: translate(-50%, -40%) rotate(-45deg);
                                            font-size: 100px;
                                            color: rgba(0, 0, 0, 0.08);
                                            font-weight: bold;
                                            z-index: 0;
                                            white-space: nowrap;
                                            pointer-events: none;
                                            width: 100%;
                                            text-align: center;
                                            text-shadow:
                                                2px 2px 0 rgba(0, 0, 0, 0.04),
                                                4px 4px 0 rgba(0, 0, 0, 0.03),
                                                6px 6px 0 rgba(0, 0, 0, 0.02);
                                            filter: blur(0.2px);
                                        }
                                        body { 
                                            -webkit-print-color-adjust: exact !important;
                                            print-color-adjust: exact !important;
                                            font-family: sans-serif; 
                                            padding: 20px; 
                                        }
                                        table { 
                                            border-collapse: collapse; 
                                            width: 100%; 
                                            position: relative;
                                            z-index: 1;
                                        }
                                        th, td { border: 1px solid #ddd; padding: 2px; }
                                    }
                                </style>
                            </head>
                            <body>
                                <div class="print-watermark-text">${companyName}</div>
                                ${updatedData}
                            </body>
                        </html>
                    `;

                    doc.open();
                    doc.write(html);
                    doc.close();

                    // Wait for image load inside iframe before printing
                    const logoImage = doc.getElementById('company-logo');

                    if (logoImage) {
                        // Attach load event listener
                        logoImage.addEventListener('load', () => {
                            iframe.contentWindow.focus();
                            iframe.contentWindow.print();
                        });
                    }
                })
                .catch(error => console.error('Error loading print content:', error));
        });
    });
 </script>
<!-- Demo bar chart -->
<!-- <script>
    const userCanvas  = document.getElementById('userLogDateChart').getContext('2d');

    const userCtx = new Chart(userCanvas , {
        type: 'bar', // base type, we'll mix types
        data: {
            labels: [
                "Jan", "Feb", "Mar", "Apr", "May", "Jun",
                "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"
            ],
            datasets: [
                {
                    type: 'bar',
                    label: 'Users Logout',
                    borderColor: '#e74a3b',
                    backgroundColor: 'transparent',
                    borderWidth: 2,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "#e74a3b",
                    data: [40000, 42000, 45000, 45000, 47000, 43000, 42000, 43000, 41000, 45000, 42000, 50000],
                    order: 2
                },
                {
                    type: 'bar',
                    label: 'Users Login',
                    backgroundColor: 'rgba(28,200,138,0.5)',
                    borderColor: 'rgba(28,200,138,1)',
                    fill: true,
                    tension: 0.4,
                    pointRadius: 5,
                    pointHoverRadius: 8,
                    pointBackgroundColor: "darkgreen",
                    data: [5000, 7000, 6000, 30000, 20000, 15000, 13000, 20000, 15000, 10000, 19000, 22000],
                    order: 3
                },
                {
                    type: 'bar',
                    label: 'Users Activity',
                    backgroundColor: '#4e73df',
                    data: [20000, 30000, 25000, 70000, 50000, 35000, 30000, 43000, 35000, 30000, 40000, 50000],
                    order: 1
                }
            ]
        },
        options: {
            responsive: true,
            plugins: {
                title: {
                    display: true,
                    text: 'Monthly Sales Data'
                },
                tooltip: {
                    mode: 'index',
                    intersect: false,
                    callbacks: {
                        label: function(context) {
                            let value = context.parsed.y;
                            return context.dataset.label + ': $' + formatWithSuffix(value);
                        }
                    }
                },
                legend: {
                    display:true,
                    onClick: (e, legendItem, legend) => {
                        const index = legendItem.datasetIndex;
                        const chart = legend.chart;
                        const meta = chart.getDatasetMeta(index);
                        meta.hidden = meta.hidden === null ? !chart.data.datasets[index].hidden : null;
                        chart.update();
                    }
                }
            },
            interaction: {
                mode: 'index',
                intersect: false
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        callback: function(value) {
                            return '$' + formatWithSuffix(value);
                        }
                    }
                }
            }
        }
    });

    // Helper function to add suffixes like K/M
    function formatWithSuffix(value) {
        const suffixes = ['', 'K', 'M', 'B'];
        let order = Math.floor(Math.log10(Math.abs(value)) / 3);
        order = Math.max(0, Math.min(order, suffixes.length - 1));
        return (value / Math.pow(1000, order)).toFixed(1) + suffixes[order];
    }
</script> -->
<!-- <script>
    window.onload = function () {
        const ctx = document.getElementById('chartContainer').getContext('2d');

        const dataValues = [67, 28, 10, 7, 15, 6];
        const dataLabels = ['Inbox', 'Archives', 'Labels', 'Drafts', 'Trash', 'Spam'];
        const total = dataValues.reduce((a, b) => a + b, 0);

        new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: dataLabels,
                datasets: [{
                    data: dataValues,
                    backgroundColor: [
                        '#4e73df', '#e74a3b', '#a4de02', '#2ed9c3', '#8e44ad', '#36b9cc'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                cutout: '60%',
                plugins: {
                    legend: {
                        display: false
                    },
                    title: {
                        display: true,
                        text: 'Email Categories',
                        align: 'start',
                        padding: {
                            top: 10,
                            bottom: 30
                        }
                    },
                    datalabels: {
                        color: '#000',
                        anchor: 'end',
                        align: 'start',
                        offset: 10,
                        clamp: true,
                        formatter: function (value, context) {
                            const percent = ((value / total) * 100).toFixed(2);
                            return `${context.chart.data.labels[context.dataIndex]} - ${percent}%`;
                        }
                    }
                }
            },
            plugins: [ChartDataLabels]
        });
    };
</script> -->
<script>
    // --------------------- DRAG FUNCTIONALITY ---------------------
    function makeDraggable(wrapperId) {
        const wrapper = document.getElementById(wrapperId);
        let offsetX = 0, offsetY = 0, isDragging = false;

        // Restore from localStorage if exists
        const savedPosition = JSON.parse(localStorage.getItem(wrapperId));
        if (savedPosition) {
            wrapper.style.left = savedPosition.left;
            wrapper.style.top = savedPosition.top;
        }

        wrapper.addEventListener("mousedown", (e) => {
            isDragging = true;
            offsetX = e.clientX - wrapper.offsetLeft;
            offsetY = e.clientY - wrapper.offsetTop;
            wrapper.style.zIndex = 1;
        });

        document.addEventListener("mousemove", (e) => {
            if (isDragging) {
                const left = (e.clientX - offsetX);
                const top = (e.clientY - offsetY);

                wrapper.style.left = left + "px";
                wrapper.style.top = top + "px";

                // Save position to localStorage
                localStorage.setItem(wrapperId, JSON.stringify({
                    left: wrapper.style.left,
                    top: wrapper.style.top
                }));

                drawConnection();
            }
        });

        document.addEventListener("mouseup", () => {
            isDragging = false;
            wrapper.style.zIndex = 0;
        });
    }

    makeDraggable("userTableWrapper");
    makeDraggable("emailTableWrapper");
    makeDraggable("loginTableWrapper");
    makeDraggable("database");

    // --------------------- LINE DRAWING ---------------------
    function drawConnection() {
        const svg = document.getElementById("svg");
        const svgRect = svg.getBoundingClientRect();

        const connections = [
            {
                groupId: "connectorServer",
                color: "#4e73df",
                getStartPosition: () => {
                    const el = document.querySelector("#server");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.right - 20 - svgRect.left,
                        y: rect.top + rect.height / 2 - svgRect.top
                    };
                },
                getEndPosition: () => {
                    const el = document.querySelector("#database");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.left - 10 - svgRect.left,
                        y: rect.top + rect.height / 2 - svgRect.top
                    };
                }
            },
            {
                groupId: "connectorDatabseGroup",
                color: "#4e73df",
                getStartPosition: () => {
                    const el = document.querySelector("#database");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.right - 22 - svgRect.left,
                        y: rect.top + rect.height / 2 - svgRect.top
                    };
                },
                getEndPosition: () => {
                    const el = document.querySelector("#userTable thead tr th:nth-child(1)");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.left + 1.5 - svgRect.left,
                        y: rect.top + rect.height / 2 - svgRect.top
                    };
                }
            },
            {
                groupId: "connectorUserGroup",
                color: "rgb(238, 155, 53)",
                getStartPosition: () => {
                    const el = document.querySelector("#userTable thead tr th:nth-child(1)");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.right - 185 - svgRect.left,
                        y: rect.top + rect.height / 2 - svgRect.top
                    };
                },
                getEndPosition: () => {
                    const el = document.querySelector("#emailTable thead tr th:nth-child(1)");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.left - 18 - svgRect.left,
                        y: rect.top + rect.height / 2 - svgRect.top
                    };
                }
            },
            {
                groupId: "connectorLoginGroup",
                color: "rgb(0, 180, 200)",
                getStartPosition: () => {
                    const el = document.querySelector("#userTable thead tr th:nth-child(1)");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.right - 185 - svgRect.left,
                        y: rect.bottom - 10 - svgRect.top
                    };
                },
                getEndPosition: () => {
                    const el = document.querySelector("#loginTable thead tr th:nth-child(1)");
                    if (!el) return null;
                    const rect = el.getBoundingClientRect();
                    return {
                        x: rect.left - 18 - svgRect.left,
                        y: rect.top + rect.height / 2 - svgRect.top
                    };
                }
            }
        ];

        connections.forEach(conn => {
            const group = document.getElementById(conn.groupId);
            if (!group) return;

            const startPos = conn.getStartPosition?.();
            const endPos = conn.getEndPosition?.();
            if (!startPos || !endPos) return;

            const { x: startX, y: startY } = startPos;
            const { x: endX, y: endY } = endPos;

            const dx = (endX - startX) * 0; // curve controll
            const pathD = `
                M ${startX} ${startY}
                C ${startX + dx} ${startY},
                ${endX - dx} ${endY},
                ${endX} ${endY}
            `;

            const path = group.querySelector(".connectorPath");
            if (path) {
                path.setAttribute("d", pathD.trim());
                path.setAttribute("stroke", conn.color || "#999");
                path.style.strokeDasharray = "5,5";
                path.style.animation = "none";
                void path.offsetWidth;
                path.style.animation = "dashmove 1s linear infinite";
            }

            const startSocket = group.querySelector(".startSocket");
            if (startSocket) {
                startSocket.setAttribute("cx", startX);
                startSocket.setAttribute("cy", startY);
                startSocket.setAttribute("fill", conn.color || "#999");
            }

            const endSocket = group.querySelector(".endSocket");
            if (endSocket) {
                const angle = Math.atan2(endY - startY, endX - startX) * (180 / Math.PI);
                endSocket.setAttribute("transform", `translate(${endX}, ${endY}) rotate(${angle})`);
            }
        });
    }

    // --------------------- ENSURE INITIAL DRAW ---------------------
    function waitForLayoutThenDraw() {
        const userRow = document.querySelector("#userTable thead tr");
        const emailRow = document.querySelector("#emailTable thead tr");

        if (!userRow || !emailRow) return;

        const userRect = userRow.getBoundingClientRect();
        const emailRect = emailRow.getBoundingClientRect();

        const layoutReady =
            userRect.top > 0 && emailRect.top > 0 && userRect.left !== emailRect.left;

        if (layoutReady) {
            drawConnection();
        } else {
            requestAnimationFrame(waitForLayoutThenDraw);
        }
    }

    document.addEventListener("DOMContentLoaded", waitForLayoutThenDraw);

    window.addEventListener("resize", drawConnection);
</script>
<!-- <script>
    // --------------------- DRAG FUNCTIONALITY ---------------------
    function makeDraggable(wrapperId) {
        const wrapper = document.getElementById(wrapperId);
        let offsetX = 0, offsetY = 0, isDragging = false;

        wrapper.addEventListener("mousedown", (e) => {
            isDragging = true;
            offsetX = e.clientX - wrapper.offsetLeft;
            offsetY = e.clientY - wrapper.offsetTop;
            wrapper.style.zIndex = 1;
        });

        document.addEventListener("mousemove", (e) => {
            if (isDragging) {
                wrapper.style.left = (e.clientX - offsetX) + "px";
                wrapper.style.top = (e.clientY - offsetY) + "px";
                drawConnection();
            }
        });

        document.addEventListener("mouseup", () => {
            isDragging = false;
            wrapper.style.zIndex = 0;
        });
    }

    makeDraggable("userTableWrapper");
    makeDraggable("emailTableWrapper");

    // --------------------- LINE DRAWING ---------------------
    function drawConnection() {
        const svg = document.getElementById("svg");
        const path = document.getElementById("resizablePath");
        const startPoint = document.getElementById("startPoint");
        const endPoint = document.getElementById("endPoint");

        const svgRect = svg.getBoundingClientRect();
        const userRow = document.querySelector("#userTable tbody tr");
        const emailRow = document.querySelector("#emailTable tbody tr");

        if (!userRow || !emailRow) return;

        const userRect = userRow.getBoundingClientRect();
        const emailRect = emailRow.getBoundingClientRect();

        const startX = userRect.right - svgRect.left;
        const startY = userRect.top + userRect.height / 2 - svgRect.top;

        const endX = emailRect.left - svgRect.left;
        const endY = emailRect.top + emailRect.height / 2 - svgRect.top;

        const dx = (endX - startX) * 0.3;

        const d = `
            M ${startX} ${startY}
            C ${startX + dx} ${startY},
            ${endX - dx} ${endY},
            ${endX} ${endY}
        `;

        path.setAttribute("d", d.trim());
        startPoint.setAttribute("transform", `translate(${startX},${startY}) rotate(-90)`);
        endPoint.setAttribute("transform", `translate(${endX},${endY}) rotate(90)`);
    }

    // Initial draw
    document.addEventListener("DOMContentLoaded", drawConnection);
    window.addEventListener("resize", drawConnection);
</script> -->
<!-- <script>
(function () {
  const svg = document.getElementById("svg");
  const path = document.getElementById("resizablePath");
  const start = document.getElementById("startPoint");
  const end = document.getElementById("endPoint");

  let draggingPoint = null;

  const getMouseCoords = (e) => {
    const rect = svg.getBoundingClientRect();
    return {
      x: e.clientX - rect.left,
      y: e.clientY - rect.top
    };
  };

  const getPositionFromTransform = (element) => {
    const transform = element.getAttribute("transform");
    if (!transform) return { x: 0, y: 0 };
    const match = transform.match(/translate\(([^,]+),\s*([^)]+)\)/);
    if (!match) return { x: 0, y: 0 };
    return {
      x: parseFloat(match[1]),
      y: parseFloat(match[2])
    };
  };

  const setPositionPreserveRotation = (element, x, y) => {
    const rotation = element.getAttribute("data-rotation") || "0";
    element.setAttribute("transform", `translate(${x},${y}) rotate(${rotation})`);
  };

  const updatePath = () => {
    const startPos = getPositionFromTransform(start);
    const endPos = getPositionFromTransform(end);
    const dx = endPos.x - startPos.x;
    const curveStrength = 1.1;
    const cx1 = startPos.x + dx * curveStrength;
    const cy1 = startPos.y;
    const cx2 = endPos.x - dx * curveStrength;
    const cy2 = endPos.y;
    const d = `M${startPos.x} ${startPos.y} C ${cx1} ${cy1}, ${cx2} ${cy2}, ${endPos.x} ${endPos.y}`;
    path.setAttribute("d", d);
  };

  const onMouseDown = (e) => {
    if (e.target === start || e.target === end) {
      draggingPoint = e.target;
    }
  };

  const onMouseMove = (e) => {
    if (!draggingPoint) return;
    const { x, y } = getMouseCoords(e);
    setPositionPreserveRotation(draggingPoint, x, y);
    updatePath();
  };

  const onMouseUp = () => {
    draggingPoint = null;
  };

  svg.addEventListener("mousedown", onMouseDown);
  svg.addEventListener("mousemove", onMouseMove);
  svg.addEventListener("mouseup", onMouseUp);
  svg.addEventListener("mouseleave", onMouseUp);

  updatePath(); // Initial render
})();
</script>

<script>
(function () {
  const svg = document.getElementById("svgDemo");
  const path = document.getElementById("resizablePathDemo");
  const start = document.getElementById("startPointDemo");
  const end = document.getElementById("endPointDemo");

  let draggingPoint = null;

  const getMouseCoords = (e) => {
    const rect = svg.getBoundingClientRect();
    return {
      x: e.clientX - rect.left,
      y: e.clientY - rect.top
    };
  };

  const getPositionFromTransform = (element) => {
    const transform = element.getAttribute("transform");
    if (!transform) return { x: 0, y: 0 };
    const match = transform.match(/translate\(([^,]+),\s*([^)]+)\)/);
    if (!match) return { x: 0, y: 0 };
    return {
      x: parseFloat(match[1]),
      y: parseFloat(match[2])
    };
  };

  const setPositionPreserveRotation = (element, x, y) => {
    const rotation = element.getAttribute("data-rotation") || "0";
    element.setAttribute("transform", `translate(${x},${y}) rotate(${rotation})`);
  };

  const updatePath = () => {
    const startPos = getPositionFromTransform(start);
    const endPos = getPositionFromTransform(end);
    const dx = endPos.x - startPos.x;
    const curveStrength = 1.1;
    const cx1 = startPos.x + dx * curveStrength;
    const cy1 = startPos.y;
    const cx2 = endPos.x - dx * curveStrength;
    const cy2 = endPos.y;
    const d = `M${startPos.x} ${startPos.y} C ${cx1} ${cy1}, ${cx2} ${cy2}, ${endPos.x} ${endPos.y}`;
    path.setAttribute("d", d);
  };

  const onMouseDown = (e) => {
    if (e.target === start || e.target === end) {
      draggingPoint = e.target;
    }
  };

  const onMouseMove = (e) => {
    if (!draggingPoint) return;
    const { x, y } = getMouseCoords(e);
    setPositionPreserveRotation(draggingPoint, x, y);
    updatePath();
  };

  const onMouseUp = () => {
    draggingPoint = null;
  };

  svg.addEventListener("mousedown", onMouseDown);
  svg.addEventListener("mousemove", onMouseMove);
  svg.addEventListener("mouseup", onMouseUp);
  svg.addEventListener("mouseleave", onMouseUp);

  updatePath(); // Initial render
})();
</script> -->

<!-- <script>
    // resize line is correct code
  const svg = document.getElementById("svg");
  const path = document.getElementById("resizablePath");
  const start = document.getElementById("startPoint");
  const end = document.getElementById("endPoint");

  let draggingPoint = null;

  const getMouseCoords = (e) => {
    const rect = svg.getBoundingClientRect();
    return {
      x: e.clientX - rect.left,
      y: e.clientY - rect.top
    };
  };

  const getPositionFromTransform = (element) => {
    const transform = element.getAttribute("transform");
    if (!transform) return { x: 0, y: 0 };

    const match = transform.match(/translate\(([^,]+),\s*([^)]+)\)/);
    if (!match) return { x: 0, y: 0 };

    return {
      x: parseFloat(match[1]),
      y: parseFloat(match[2])
    };
  };

  const setPositionPreserveRotation = (element, x, y) => {
    const rotation = element.getAttribute("data-rotation") || "0";
    element.setAttribute("transform", `translate(${x},${y}) rotate(${rotation})`);
  };

  const updatePath = () => {
    const startPos = getPositionFromTransform(start);
    const endPos = getPositionFromTransform(end);

    const dx = endPos.x - startPos.x;
    const dy = endPos.y - startPos.y;

    // Horizontal curve bias
    const curveStrength = 1.1;
    const cx1 = startPos.x + dx * curveStrength;
    const cy1 = startPos.y;
    const cx2 = endPos.x - dx * curveStrength;
    const cy2 = endPos.y;

    const d = `M${startPos.x} ${startPos.y} C ${cx1} ${cy1}, ${cx2} ${cy2}, ${endPos.x} ${endPos.y}`;
    path.setAttribute("d", d);
  };

  const onMouseDown = (e) => {
    if (e.target === start || e.target === end) {
      draggingPoint = e.target;
    }
  };

  const onMouseMove = (e) => {
    if (!draggingPoint) return;

    const { x, y } = getMouseCoords(e);
    setPositionPreserveRotation(draggingPoint, x, y);
    updatePath();
  };

  const onMouseUp = () => {
    draggingPoint = null;
  };

  svg.addEventListener("mousedown", onMouseDown);
  svg.addEventListener("mousemove", onMouseMove);
  svg.addEventListener("mouseup", onMouseUp);
  svg.addEventListener("mouseleave", onMouseUp);

  updatePath(); // Initial render
</script> -->

<!-- <script>
  const svg = document.getElementById("svg");
  const path = document.getElementById("resizablePath");
  const start = document.getElementById("startPoint");
  const end = document.getElementById("endPoint");

  let draggingPoint = null;

  const getMouseCoords = (e) => {
    const rect = svg.getBoundingClientRect();
    return {
      x: e.clientX - rect.left,
      y: e.clientY - rect.top
    };
  };

    const getPositionFromTransform = (element) => {
        const transform = element.getAttribute("transform");
        if (!transform) return { x: 0, y: 0 }; // fallback position

        const match = transform.match(/translate\(([^,]+),\s*([^)]+)\)/);
        if (!match) return { x: 0, y: 0 }; // if pattern doesn't match

        return {
            x: parseFloat(match[1]),
            y: parseFloat(match[2])
        };
    };

  const setPosition = (element, x, y) => {
    element.setAttribute("transform", `translate(${x},${y})`);
  };

  const updatePath = () => {
    const startPos = getPositionFromTransform(start);
    const endPos = getPositionFromTransform(end);

    // Control points for cubic Bezier
    const dx = endPos.x - startPos.x;
    const dy = endPos.y - startPos.y;

    // Curve strength (dynamic)
    const curveStrength = 1; // tweak this to make it more/less curvy
    const cx1 = startPos.x + dx * curveStrength;
    const cy1 = startPos.y;
    const cx2 = endPos.x - dx * curveStrength;
    const cy2 = endPos.y;

    const d = `M${startPos.x} ${startPos.y} C ${cx1} ${cy1}, ${cx2} ${cy2}, ${endPos.x} ${endPos.y}`;
    path.setAttribute("d", d);
  };

  const onMouseDown = (e) => {
    if (e.target === start || e.target === end) {
      draggingPoint = e.target;
    }
  };

  const onMouseMove = (e) => {
    if (!draggingPoint) return;

    const { x, y } = getMouseCoords(e);
    setPosition(draggingPoint, x, y);
    updatePath();
  };

  const onMouseUp = () => {
    draggingPoint = null;
  };

  svg.addEventListener("mousedown", onMouseDown);
  svg.addEventListener("mousemove", onMouseMove);
  svg.addEventListener("mouseup", onMouseUp);
  svg.addEventListener("mouseleave", onMouseUp);

  updatePath(); // initial render
</script> -->
<!-- <script>
  const svg = document.getElementById("svg");
  const path = document.getElementById("resizablePath");
  const start = document.getElementById("startPoint");
  const end = document.getElementById("endPoint");

  let draggingPoint = null;

  const getMouseCoords = (e) => {
    const rect = svg.getBoundingClientRect();
    return {
      x: e.clientX - rect.left,
      y: e.clientY - rect.top
    };
  };

  const updatePath = () => {
    const startX = parseFloat(start.getAttribute("x")) + 6;
    const startY = parseFloat(start.getAttribute("y")) + 6;
    const endX = parseFloat(end.getAttribute("x")) + 6;
    const endY = parseFloat(end.getAttribute("y")) + 6;

    // control point for curve — you can tweak the multiplier for effect
    const controlX = (startX + endX) / 2;
    const controlY = Math.min(startY, endY) - 50;

    const d = `M${startX} ${startY} Q ${controlX} ${controlY}, ${endX} ${endY}`;
    path.setAttribute("d", d);
  };

  const onMouseDown = (e) => {
    if (e.target === start || e.target === end) {
      draggingPoint = e.target;
    }
  };

  const onMouseMove = (e) => {
    if (!draggingPoint) return;

    const { x, y } = getMouseCoords(e);
    draggingPoint.setAttribute("x", x - 6);
    draggingPoint.setAttribute("y", y - 6);
    updatePath();
  };

  const onMouseUp = () => {
    draggingPoint = null;
  };

  svg.addEventListener("mousedown", onMouseDown);
  svg.addEventListener("mousemove", onMouseMove);
  svg.addEventListener("mouseup", onMouseUp);
  svg.addEventListener("mouseleave", onMouseUp);

  // Initial render
  updatePath();
</script> -->
<!-- <script>
  const svg = document.getElementById("svg");
  const line = document.getElementById("resizableLine");
  const start = document.getElementById("startPoint");
  const end = document.getElementById("endPoint");

  let draggingPoint = null;

  const onMouseDown = (e) => {
    draggingPoint = e.target;
  };

  const onMouseMove = (e) => {
    if (!draggingPoint) return;

    const rect = svg.getBoundingClientRect();
    const x = e.clientX - rect.left;
    const y = e.clientY - rect.top;

    draggingPoint.setAttribute("cx", x);
    draggingPoint.setAttribute("cy", y);

    if (draggingPoint === start) {
      line.setAttribute("x1", x);
      line.setAttribute("y1", y);
    } else if (draggingPoint === end) {
      line.setAttribute("x2", x);
      line.setAttribute("y2", y);
    }
  };

  const onMouseUp = () => {
    draggingPoint = null;
  };

  start.addEventListener("mousedown", onMouseDown);
  end.addEventListener("mousedown", onMouseDown);
  svg.addEventListener("mousemove", onMouseMove);
  svg.addEventListener("mouseup", onMouseUp);
  svg.addEventListener("mouseleave", onMouseUp);
</script> -->

<!-- <svg viewBox="0 0 64 64" fill="none" fill-rule="evenodd" stroke="#4f4f4f" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"><path d="M10 10h22v44h22"/><path d="M15 5v10m39 33l-7 6M21 5v10m33 45l-7-6m-2-5v10"/></svg>

<svg id="svg">
    <path id="resizablePath" d="M0 0" stroke="rgb(238, 155, 53)" fill="none" stroke-width="2" />
    <path id="startPoint" data-rotation="-90" transform="translate(0,0) rotate(-90)" style="fill: darkorange;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
    <path id="endPoint" data-rotation="90" transform="translate(0,0) rotate(90)" style="fill: darkorange;" d="M-5 -15 L5 -15 L5 15 L-5 15 Z" />
</svg> -->

@endPush
@elseif($user_log_data_table_permission == 0)
@include('super-admin.user-details.error.data-table-permission')
@endif
@elseif($user_activity_graph_authorize ==0)
@include('super-admin.user-details.error.unauthorize')
@endif