@extends('shop::base')

@section('aimeos_header')
    <?= $aiheader['locale/select'] ?>
    <?= $aiheader['basket/mini'] ?>
    <?= $aiheader['catalog/filter'] ?>
    <?= $aiheader['catalog/stage'] ?>
    <?= $aiheader['catalog/lists'] ?>
@stop

@section('aimeos_head')
    <?= $aibody['locale/select'] ?>
    <?= $aibody['basket/mini'] ?>
@stop

@section('aimeos_nav')
    <?= $aibody['catalog/filter'] ?>
@stop

@section('aimeos_stage')
    <?= $aibody['catalog/stage'] ?>
@stop

@section('aimeos_body')
     <?= $aibody['catalog/lists'] ?>
@stop
