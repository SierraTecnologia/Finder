@extends('layouts.app')

@section('pageTitle') Finder Person Title 2 @stop


@section('title', 'Finder Person Title 1')

@section('content_header')
    <h1>Finder Person</h1>
@stop



@section('content')

<!-- Main row -->
<div class="row">
        <!-- Left col -->
        <div class="col-md-8">
          <!-- MAP & BOX PANE -->
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title">Visitors Report</h3>

              <div class="box-tools pull-right">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="row">
                <div class="col-md-9 col-sm-8">
                  <div class="pad">
                    <!-- Map will be created here -->
                    <div id="world-map-markers" style="height: 325px;"></div>
                  </div>
                </div>
                <!-- /.col -->
                <div class="col-md-3 col-sm-4">
                  <div class="pad box-pane-right bg-green" style="min-height: 280px">
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,70,90,70,75,80,70</div>
                      <h5 class="description-header">8390</h5>
                      <span class="description-text">Visits</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block margin-bottom">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">30%</h5>
                      <span class="description-text">Referrals</span>
                    </div>
                    <!-- /.description-block -->
                    <div class="description-block">
                      <div class="sparkbar pad" data-color="#fff">90,50,90,70,61,83,63</div>
                      <h5 class="description-header">70%</h5>
                      <span class="description-text">Organic</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->






        <div class="col-md-4">
            <!-- USERS LIST -->
            <div class="box box-danger">
            <div class="box-header with-border">
                <h3 class="box-title">Latest Members</h3>

                <div class="box-tools pull-right">
                <span class="label label-danger">8 New Members</span>
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i>
                </button>
                </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
                <ul class="users-list clearfix">
                <li>
                    <img src="dist/img/user1-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander Pierce</a>
                    <span class="users-list-date">Today</span>
                </li>
                <li>
                    <img src="dist/img/user8-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Norman</a>
                    <span class="users-list-date">Yesterday</span>
                </li>
                <li>
                    <img src="dist/img/user7-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Jane</a>
                    <span class="users-list-date">12 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user6-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">John</a>
                    <span class="users-list-date">12 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user2-160x160.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander</a>
                    <span class="users-list-date">13 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user5-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Sarah</a>
                    <span class="users-list-date">14 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user4-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nora</a>
                    <span class="users-list-date">15 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user3-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nadia</a>
                    <span class="users-list-date">15 Jan</span>
                </li>
                </ul>
                <!-- /.users-list -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer text-center">
                <a href="javascript:void(0)" class="uppercase">View All Users</a>
            </div>
            <!-- /.box-footer -->
            </div>
            <!--/.box -->
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

@stop

@section('js')
    <script> 
    /* jVector Maps
    * ------------
    * Create a world map with markers
    */
    $('#world-map-markers').vectorMap({
        map              : 'world_mill_en',
        normalizeFunction: 'polynomial',
        hoverOpacity     : 0.7,
        hoverColor       : false,
        backgroundColor  : 'transparent',
        regionStyle      : {
        initial      : {
            fill            : 'rgba(210, 214, 222, 1)',
            'fill-opacity'  : 1,
            stroke          : 'none',
            'stroke-width'  : 0,
            'stroke-opacity': 1
        },
        hover        : {
            'fill-opacity': 0.7,
            cursor        : 'pointer'
        },
        selected     : {
            fill: 'yellow'
        },
        selectedHover: {}
        },
        markerStyle      : {
        initial: {
            fill  : '#00a65a',
            stroke: '#111'
        }
        },
        markers          : [
        { latLng: [41.90, 12.45], name: 'Vatican City' },
        { latLng: [43.73, 7.41], name: 'Monaco' },
        { latLng: [-0.52, 166.93], name: 'Nauru' },
        { latLng: [-8.51, 179.21], name: 'Tuvalu' },
        { latLng: [43.93, 12.46], name: 'San Marino' },
        { latLng: [47.14, 9.52], name: 'Liechtenstein' },
        { latLng: [7.11, 171.06], name: 'Marshall Islands' },
        { latLng: [17.3, -62.73], name: 'Saint Kitts and Nevis' },
        { latLng: [3.2, 73.22], name: 'Maldives' },
        { latLng: [35.88, 14.5], name: 'Malta' },
        { latLng: [12.05, -61.75], name: 'Grenada' },
        { latLng: [13.16, -61.23], name: 'Saint Vincent and the Grenadines' },
        { latLng: [13.16, -59.55], name: 'Barbados' },
        { latLng: [17.11, -61.85], name: 'Antigua and Barbuda' },
        { latLng: [-4.61, 55.45], name: 'Seychelles' },
        { latLng: [7.35, 134.46], name: 'Palau' },
        { latLng: [42.5, 1.51], name: 'Andorra' },
        { latLng: [14.01, -60.98], name: 'Saint Lucia' },
        { latLng: [6.91, 158.18], name: 'Federated States of Micronesia' },
        { latLng: [1.3, 103.8], name: 'Singapore' },
        { latLng: [1.46, 173.03], name: 'Kiribati' },
        { latLng: [-21.13, -175.2], name: 'Tonga' },
        { latLng: [15.3, -61.38], name: 'Dominica' },
        { latLng: [-20.2, 57.5], name: 'Mauritius' },
        { latLng: [26.02, 50.55], name: 'Bahrain' },
        { latLng: [0.33, 6.73], name: 'São Tomé and Príncipe' }
        ]
    });
  </script>
@stop