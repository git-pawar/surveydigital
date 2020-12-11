@extends('master')
@section('title','Surveyor Dashboard')
@section('content')

<style>
summary {
          font-size: 15px;
    font-weight: 600;
    background-color: #fff;
    color: #fff;
    padding: 7px 13px;
    margin-top: 20px;
    outline: none;
    border: 1px solid #012954;
    border-radius: 0.25rem;
    text-align: left;
    cursor: pointer;
    margin-top: 0px;
    position: relative;
    background: #012954;
}
details[open] summary ~ * {
  animation: sweep .5s ease-in-out;
}
@keyframes sweep {
  0%    {opacity: 0; margin-top: -10px}
  100%  {opacity: 1; margin-top: 0px}
}
details > summary::after {
  position: absolute;
  content: "+";
  right: 20px;
}
details[open] > summary::after {
  position: absolute;
  content: "-";
  right: 20px;
}
details > summary::-webkit-details-marker {
  display: none;
}
details
{
    border: 1px solid #eaeaea;
    border-radius: 5px;
    margin-bottom: 10px;
}
.submenu a {
    padding: 5px 0px 6px;
    display: block;
    font-size: 13px;
    color: black;
    font-weight: 500;
    border-bottom: 1px dashed #ccc;
}
.submenu a:last-child{
    border-bottom: none;
}
.submenu {
    padding: 7px 13px;
}
</style>
<div class="maininnersection">
<details >
    <summary>Survey</summary>
    <div class="faq__content">
      <div class="submenu">
      <a href="">Part wise </a>
       <a href="">Name wise </a>
        <a href="">House no wise </a>
         <a href="">category wisee </a>
          <a href="">Red/Green/Yellow search </a>
           <a href="">Mobile Number Search </a>
        <a href="">Voter list view </a>
      </div>
    </div>
  </details>

    <details>
    <summary>Poling Booth</summary>
    <div class="faq__content">
      <div class="faq__content">
      <div class="submenu">
      <a href="">View voter list </a>
       <a href="">Analysis </a>

      </div>
    </div>
    </div>
  </details>
</div>
@endsection
