@extends('layout')

@section('title')
    Bestline - Options
@stop

@section('javascript-head')
    @parent
    <script src="/js/vendor/bower_components/angular-smart-table/dist/smart-table.min.js" type="application/javascript"></script>
    <script src="/js/source/angular/includes/inject-angular-smart-table.js" type="text/javascript"></script>
    <script src="/js/source/angular/directives/bestline-api-errors.js" type="application/javascript"></script>
    <script src="/js/source/angular/services/bestline-api.js" type="application/javascript"></script>
    <script src="/js/source/angular/parts/options.js" type="application/javascript"></script>
@stop

@section('main')
  <div ng-controller="PartsOptionsController as vmOptions" ng-cloak class="col-md-12">
  <div class="row header-row">
            <div class="col-md-6 header-title">
                <h1>Options &amp; Sub-Options<span ng-show="vmOptions.loadingSuboptions"><span class="fa fa-circle-o-notch fa-spin"></span></span>
                </h1>
            </div>
            <div class="col-md-3"></div>
            <div class="col-md-3 header-buttons"><a class="btn btn-default btn-sm b-margin b-top" href="/parts/options/new"> <span class="">New Option</span></a></div>
        </div>
    <ul class="nav nav-tabs tabs-up center-nav">
        <li ng-class="{active: vmOptions.activeTab === 'suboptions'}">
            <a data-toggle="tab" rel="tooltip" ng-click="vmOptions.activeTab = 'suboptions'" href="#suboptions">Suboptions</a>
        </li>
        <li ng-class="{active: vmOptions.activeTab === 'options'}">
            <a data-toggle="tab"  rel="tooltip" ng-click="vmOptions.activeTab = 'options'" href="#options">Options</a>
        </li>
        <li class="pull-right"></li>
    </ul>
    <div class="tab-content">
        <div ng-show="vmOptions.activeTab === 'suboptions'">
          <div st-table="vmOptions.stFilteredSubOptions"
            st-safe-src="vmOptions.suboptions">

            <table class="table table-striped bestline-table">
              <thead>
                <tr>
                  <th st-sort="name">Name <i class="fa fa-sort"></i></th>
                  <th st-sort="parents.name">Parent <i class="fa fa-sort"></i></th>
                  <th>Price</th>
                  <th>Min Price</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><input st-search placeholder="Search" class="table-search input-sm form-control b-margin b-top" type="search"/></th>
                </tr>
              </thead>
              <tr ng-repeat="option in vmOptions.stFilteredSubOptions">
                <td>
                  {[{ option.name }]}
                  <div bestline-api-errors="option.apiErrors"></div>
                </td>
                <td>{[{ option.parents.name }]}</td>
                <td>{[{ option.pricing_value }]}</td>
                <td>{[{ option.min_charge }]}</td>
                <td>{[{ (option.price_as_fabric)? "Price as fabric" : "" }]}</td>
                <td>{[{ (option.is_embellishment_option)? "Embellishment" : "" }]}</td>
                <td>{[{ (option.is_interlining_option)? "Interlining" : "" }]}</td>
                <td>
                  <span ng-hide="option.loading">
                    <a class="btn btn-primary btn-xs" href="/parts/options/{[{ option.id }]}">Edit</a>
                  </span>
                </td>
              </tr>
              <tr>
                <td ng-show="vmOptions.suboptions.length === 0" colspan="3">This option has no sub-options</td>
              </tr>
            </table>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div st-pagination st-items-by-page="15" st-displayed-pages="4"></div>
                </div>
            </div>
          </div>
        </div>
        <div ng-show="vmOptions.activeTab === 'options'">
          <div st-table="vmOptions.stFilteredOptions"
            st-safe-src="vmOptions.options">

            <table class="table table-striped bestline-table">
              <thead>
                <tr>
                  <th st-sort="name" class="col-md-4">Name <i class="fa fa-sort"></i></th>
                  <th>Price</th>
                  <th>Min Price</th>
                  <th></th>
                  <th></th>
                  <th></th>
                  <th><input st-search placeholder="Search" class="table-search input-sm form-control b-margin b-top" type="search"/></th>
                </tr>
              </thead>
              <tr ng-repeat="option in vmOptions.stFilteredOptions">
                <td>
                  {[{ option.name }]}
                  <div bestline-api-errors="option.apiErrors"></div>
                </td>
                <td>{[{ option.pricing_value }]}</td>
                <td>{[{ option.min_charge }]}</td>
                <td>{[{ (option.price_as_fabric)? "Price as fabric" : "" }]}</td>
                <td>{[{ (option.is_embellishment_option)? "Embellishment" : "" }]}</td>
                <td>{[{ (option.is_interlining_option)? "Interlining" : "" }]}</td>
                <td>
                  <span ng-hide="option.loading">
                    <a class="btn btn-primary btn-xs" href="/parts/options/{[{ option.id }]}">Edit</a>
                  </span>
                </td>
              </tr>
            </table>
            <div class="row">
                <div class="col-md-12 text-center">
                    <div st-pagination st-items-by-page="15" st-displayed-pages="4"></div>
                </div>
            </div>
          </div>
        </div>
    </div>
  </div>

@stop