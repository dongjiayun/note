<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = '关于我';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <style>
    .snowman_body {
  fill: #F5ECC3;
  -webkit-animation: body-drop 0.5s ease-in forwards;
}

.scarf {
  fill: #EF3C3C;
  opacity: 0;
  -webkit-animation: scale 0.5s ease 1s forwards;
  -webkit-transform-origin: 55px 165px;
}

.scarf_knot {
  fill: #EF3C3C;
  opacity: 0;
  -webkit-animation: scale 0.3s ease 1.5s forwards;
  -webkit-transform-origin: 92px 190px;
}

.snowman_head {
  fill: #F5ECC3;
  -webkit-transform: translateY(-303px);
  -webkit-animation: body-drop 0.5s ease-in 0.2s forwards;
}

#hat {
  -webkit-transform: translateY(-303px);
  -webkit-animation: body-drop 0.5s ease-in 0.3s forwards;
}

.hat-top {
  fill: #5B4831;
}

.hat-ribbon {
  fill: #EF3C3C;
}

.hat-bottom {
  fill: #5B4831;
}

.nose {
  fill: #EF3C3C;
  opacity: 0;
  -webkit-animation: scale 0.3s ease 2.5s forwards;
  -webkit-transform-origin: 104px 142px;
}

.mouth-1 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.1s forwards;
  -webkit-transform-origin: 82px 156px;
}

.mouth-2 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.2s forwards;
  -webkit-transform-origin: 86px 162px;
}

.mouth-3 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.3s forwards;
  -webkit-transform-origin: 92px 167px;
}

.mouth-4 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.4s forwards;
  -webkit-transform-origin: 98px 169px;
}

.mouth-5 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.5s forwards;
  -webkit-transform-origin: 106px 171px;
}

.mouth-6 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.6s forwards;
  -webkit-transform-origin: 113px 171px;
}

.mouth-7 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.7s forwards;
  -webkit-transform-origin: 120px 171px;
}

.mouth-8 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.8s forwards;
  -webkit-transform-origin: 127px 169px;
}

.mouth-9 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 3.9s forwards;
  -webkit-transform-origin: 132px 165px;
}

.mouth-10 {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.1s ease 4.0s forwards;
  -webkit-transform-origin: 137px 160px;
}

.eye_left {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.2s ease 2.7s forwards;
  -webkit-transform-origin: 92px 122px;
}

.eye_right {
  fill: #5B4831;
  opacity: 0;
  -webkit-animation: scale 0.2s ease 2.9s forwards;
  -webkit-transform-origin: 125px 120px;
}

.button_top {
  fill: #09B0A6;
  opacity: 0;
  -webkit-animation: scale 0.3s ease 2.2s forwards;
  -webkit-transform-origin: 132px 217px;
}

.button_bottom {
  fill: #09B0A6;
  opacity: 0;
  -webkit-animation: scale 0.3s ease 2s forwards;
  -webkit-transform-origin: 132px 252px;
}

@-webkit-keyframes body-drop {
  0% {
    -webkit-transform: translateY(-303px);
  }
  100% {
    -webkit-transform: translateY(0px);
  }
}

@-webkit-keyframes scale {
  0% {
    opacity: 1;
    -webkit-transform: scale(0, 0);
  }
  100% {
    opacity: 1;
    -webkit-transform: scale(1, 1);
  }
}
    </style>
    <div class="container">
    <div class="row">
       <div class="col-xs-3">
       <svg version="1.1" id="svg_snowman" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
	 y="0px" width="286px" height="380px" viewBox="0 0 286 380" enable-background="new 0 0 286 380" xml:space="preserve">
         
         <g id="snowman">
	
             <path class="snowman_body" d="M20.302,221.826c-6.899,83.792,106.271,110.246,149.672,47.643
		C236.041,174.189,29.782,107.401,20.302,221.826z"/>
	
             <path class="scarf" d="M62.978,157.992c-5.486,2.424-8.756,6.673-7.191,13.735
		c1.887,8.643,12.927,16.689,20.227,20.237c18.053,8.676,44.348,8.364,61.527-3.758c29.854-21.115-24.191-30.144-37.011-31.832
		C92.905,155.356,73.691,153.215,62.978,157.992z"/>
	
             <path class="scarf_knot" d="M88.509,177.525c-18.559,6.252-29.452,33.552-28.112,51.221
		c0.11,0.106,0.256,0.247,0.365,0.353c8.537-1.302,15,3.198,22.443,6.22c-0.542-15.985,0.146-31.726,13.332-43.214
		c0.143-0.106,0.143-0.106,0,0c-4.759,8.534-6.463,21.221-6.463,30.845c6.247-2.494,13.292-3.97,19.828-1.826
		c-1.124-12.893-1.924-27.72,8.281-37.698c-4.831-2.986-10.494-5.587-16.126-6.641L88.509,177.525z"/>
	
             <path class="snowman_head" d="M145.783,120.573c-2.77-5.274-6.473-9.863-11.039-13.207
		c-2.725-2.003-5.629-3.761-8.606-5.304C72.5,78.667,53.571,129.255,53.534,129.323c-2.471,8.272-2.59,17.065,0.24,25.173
		c1.245,3.568,3.056,7.005,5.499,10.204c16.309,21.327,54.842,28.984,77.794,12.79C153.694,165.722,155.441,138.96,145.783,120.573z
		"/>
	
             <g id="hat">
		
                 <path class="hat-ribbon" d="M45.071,104.135l6.829,12.61c34.1-33.933,65.013-19.442,65.013-19.442l-1.961-14.935
			C90.037,83.282,65.447,89.325,45.071,104.135z"/>
		
                 <path class="hat-top" d="M112.882,63.362c0,0-8.829-9.698-36.575-5.148C37.661,64.555,35.338,85.67,35.338,85.67l9.733,18.465
			c20.376-14.81,44.966-20.853,69.881-21.766L112.882,63.362z"/>
		
                 <path class="hat-bottom" d="M53.534,129.075c0.036-0.068,25.632-34.575,72.603-27.137c2.978,1.543,5.882,3.363,8.606,5.366
			c4.566,3.344,8.269,7.964,11.039,13.238c9.431-9.731,8.321-22.45-4.971-27.139c-20.632-7.306-44.275-2.84-64.322,4.855
			c-16.056,6.149-33.525,18.058-36.938,35.628C37.229,145.866,42.802,151,53.768,154h0.006
			C50.945,146,51.063,137.347,53.534,129.075z"/>
	
             </g>
	
             <path class="nose" d="M104.781,143.55c-1.708,18.2,27.856,10.402,38.028,9.453c7.191-0.669,13.764-1.581,20.483-2.495
		c6.539-0.845,6.792-2.953,0.545-5.095c-7.264-2.53-14.02-5.127-22.008-8.219c-7.048-2.707-21.612-6.956-29.092-5.059
		C108.523,133.19,105.436,136.455,104.781,143.55z"/>
		
                 <path class="mouth-1" d="M84.079,158.94c-0.91,0.492-2.034,0.106-2.506-0.842c-0.439-0.913,0.036-1.932,0.98-2.321
			c0.944-0.421,2.034,0,2.433,0.878C85.422,157.465,84.986,158.519,84.079,158.94z"/>
		
                 <path class="mouth-2" d="M88.292,164.63c-0.691,0.739-2.034,0.881-2.651-0.036c-0.688-0.878-0.582-2.07,0.292-2.633
			c0.834-0.527,1.961-0.457,2.502,0.212C88.874,162.945,88.984,163.893,88.292,164.63z"/>
		
                 <path class="mouth-3" d="M94.43,168.426c-0.472,0.88-1.635,1.263-2.579,0.81c-1.017-0.353-1.236-1.652-0.654-2.462
			c0.581-0.842,1.562-0.984,2.469-0.701C94.54,166.458,94.865,167.513,94.43,168.426z"/>
		
                 <path class="mouth-4" d="M101.222,170.849c-0.256,0.948-1.309,1.511-2.326,1.266c-1.017-0.283-1.559-1.231-1.163-2.215
			c0.329-0.913,1.382-1.475,2.289-1.231C100.967,168.882,101.478,169.866,101.222,170.849z"/>
		
                 <path class="mouth-5" d="M108.376,172.151c-0.109,0.984-1.053,1.72-2.107,1.578c-1.053-0.106-1.741-0.983-1.525-2.002
			c0.18-0.913,1.126-1.649,2.07-1.543C107.795,170.254,108.486,171.167,108.376,172.151z"/>
		
                 <path class="mouth-6" d="M115.64,172.36c0.036,1.019-0.761,1.864-1.814,1.935c-1.053,0.103-1.891-0.739-1.817-1.793
			c0.036-0.948,0.837-1.758,1.817-1.829C114.77,170.602,115.568,171.376,115.64,172.36z"/>
		
                 <path class="mouth-7" d="M122.831,171.412c0.256,0.948-0.399,1.967-1.452,2.212c-1.017,0.318-1.964-0.418-2.107-1.437
			c-0.109-0.983,0.545-1.829,1.452-2.109C121.632,169.83,122.576,170.463,122.831,171.412z"/>
		
                 <path class="mouth-8" d="M129.587,168.953c0.508,0.878,0.146,2.002-0.837,2.494c-0.907,0.598-2.034,0.035-2.393-0.913
			c-0.329-0.948,0.107-1.864,0.871-2.388C128.025,167.722,129.115,168.075,129.587,168.953z"/>
		
                 <path class="mouth-9" d="M135.252,164.665c0.798,0.669,0.834,1.864,0.073,2.671c-0.761,0.81-1.888,0.775-2.542-0.103
			c-0.545-0.739-0.545-1.932,0-2.568C133.402,163.999,134.491,164.035,135.252,164.665z"/>
		
                 <path class="mouth-10" d="M138.994,158.763c0.944,0.318,1.416,1.408,1.017,2.426c-0.399,1.019-1.452,1.369-2.323,0.842
			c-0.874-0.527-1.346-1.617-1.053-2.426C136.961,158.763,138.014,158.413,138.994,158.763z"/>
	
             <path class="eye_left" d="M94.939,125.986c4.396-2.494,0.581-8.746-3.775-6.535
		C86.585,121.769,90.037,128.76,94.939,125.986z"/>
	
             <path class="eye_right" d="M127.663,123.63c4.393-2.456,0.582-8.746-3.778-6.497
		C119.309,119.451,122.758,126.407,127.663,123.63z"/>
	
             <path class="button_top" d="M134.053,227.38c13.039-2.391,12.205-20.626-2.323-18.904
		C116.767,210.306,119.891,229.978,134.053,227.38z"/>
	
             <path class="button_bottom" d="M130.022,262.687c11.696,1.157,17.289-16.336,5.267-19.219
		C123.522,240.659,115.205,261.176,130.022,262.687z"/>

         </g>

</svg></div>
        <script type="text/javascript" src="http://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js"></script>
        <script type="text/javascript">
           $(document).ready(
            setTimeout(function(){$(".about_content").fadeIn()},4000)
            )
        </script>
        <div class="col-xs-9 about_content" hidden>
             <h3>个人简介</h3>
             <p>帅比</p>
        </div>
      </div>
    </div>
    
</div>
