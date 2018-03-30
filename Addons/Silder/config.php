<?php
return array(
	'silder_swtich'=>array(//配置在表单中的键名 ,这个会是config[random]
		'title'=>'是否开启:',//表单的文字
		'type'=>'radio',		 //表单的类型：text、textarea、checkbox、radio、select等
		'options'=>array(		 //select 和radion、checkbox的子选项
			'1'=>'开启',		 //值=>文字
			'0'=>'关闭',
		),
		'value'=>'1',			 //表单的默认值
	),

	'silder_effect' => array(
		'title' => '切换效果',
		'type' => 'select',
		'options' => array(
			"sliceDown" => '切片',
			"sliceDownLeft" => '切片(左)',
			"sliceUp" => '切片(上)',
			"sliceUpLeft" => '切片(左上)',
			"sliceUpDown" => '切片(上下)',
			"sliceUpDownLeft" => '切片(左下)',
			"fold" => '折叠',
			"fade" => '逐渐消逝',
			"random" => '随机',
			"slideInRight" => '滑动（右）',
			"slideInLeft" => '滑动（左）',
			"boxRandom" => '随机盒子',
			"boxRain" => '盒子变体',
			"boxRainReverse" => '盒子变体(反向)',
			"boxRainGrow" => '盒子变体(拓展)',
			"boxRainGrowReverse" => '盒子变体(反向拓展)',
		),
		'value' => 'random'
	),

	'silder_animspeed' => array(
		'title' => '动画切换时间(毫秒)',
		'type' => 'text',
		'value' => 2000,
	),

);