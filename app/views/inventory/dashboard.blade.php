@extends('layout')

@section('title')
    Bestline - Inventory
@stop

@section('javascript-head')
    @parent
    <script src="/js/vendor/bower_components/angular-smart-table/dist/smart-table.min.js" type="application/javascript"></script>
    <script src="/js/source/angular/includes/inject-angular-smart-table.js" type="text/javascript"></script>
    <script src="/js/source/angular/services/bestline-api.js" type="application/javascript"></script>
    <script src="/js/source/angular/inventory/dashboard/components/fabric-table/fabric-table.directive.js" type="text/javascript"></script>
    <script src="/js/source/angular/inventory/dashboard/dashboard.controller.js" type="application/javascript"></script>
    <script src="/js/source/angular/inventory/dashboard/all-tab/all-tab.controller.js" type="application/javascript"></script>
    <script src="/js/source/angular/inventory/dashboard/bestline-tab/bestline-tab.controller.js" type="application/javascript"></script>
    <script src="/js/source/angular/inventory/dashboard/com-tab/com-tab.controller.js" type="application/javascript"></script>
    <script src="/js/source/angular/inventory/dashboard/unknown-tab/unknown-fabric-tab.controller.js" type="application/javascript"></script>
@stop

@section('main')
  <div class="templates templateInventory col-md-12" ng-controller="InventoryDashboardCtrl as vmInventory" ng-cloak>

    <div class="row header-row">
      <div class="col-md-3 header-title">
        <h1>Inventory</h1>
      </div>
      <div class="col-md-6"></div>
      <div class="col-md-3 header-buttons">
        <a href="/inventory/fabric/edit" class="btn btn-sm btn-default"><i class=""></i> New BL Fabric</a>
        <a href="/inventory/fabric/edit?com=1" class="btn btn-sm btn-default"><i class=""></i> New COM Fabric</a>
      </div>
    </div>

    <ul class="nav nav-tabs center-nav bestline-nav-badges" id="inventoryTabs">
        <li ng-class="{active: vmInventory.activeTab === 'all'}">
            <a rel="tooltip" ng-click="vmInventory.activeTab = 'all'" href="#all">All</a>
        </li>
        <li ng-class="{active: vmInventory.activeTab === 'bestline'}">
            <a rel="tooltip" ng-click="vmInventory.activeTab = 'bestline'" href="#bestline">Bestline</a>
        </li>
        <li ng-class="{active: vmInventory.activeTab === 'com'}">
            <a rel="tooltip" ng-click="vmInventory.activeTab = 'com'" href="#com">COM</a>
        </li>
        <li ng-class="{active: vmInventory.activeTab === 'unknown'}">
            <a rel="tooltip" ng-click="vmInventory.activeTab = 'unknown'" href="#unknown">Unknown</a>
        </li>
    </ul>
    <div class="tab-content">
        <div ng-show="vmInventory.activeTab === 'all'">
          <ng-include src="'/js/source/angular/inventory/dashboard/all-tab/all-tab.html'"></ng-include>
        </div>
        <div ng-show="vmInventory.activeTab === 'bestline'">
            <ng-include src="'/js/source/angular/inventory/dashboard/bestline-tab/bestline-tab.view.html'"></ng-include>
        </div>
        <div ng-show="vmInventory.activeTab === 'com'">
            <ng-include src="'/js/source/angular/inventory/dashboard/com-tab/com-tab.view.html'"></ng-include>
        </div>
        <div ng-show="vmInventory.activeTab === 'unknown'">
          <ng-include src="'/js/source/angular/inventory/dashboard/unknown-tab/unknown-fabric-tab.html'"></ng-include>
        </div>
    </div>
  </div>
@stop