<!-- caregiver/dashboard.blade.php -->
@extends('admin.layouts.app')

@section('content')
    <h1>Caregiver Dashboard</h1>
    <p>Welcome, {{ Auth::user()->name }}</p>
@endsection
