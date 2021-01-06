@extends(backpack_view('blank'))

@php

  	$salle = App\Models\Salles::count();
	$departement = App\Models\Departements::count();
	$user = App\Models\Users::count();
    $reservation = App\Models\Reservation::count();
 	// notice we use Widget::add() to add widgets to a certain group
	Widget::add()->to('before_content')->type('div')->class('row')->content([
		// notice we use Widget::make() to add widgets as content (not in a group)
		Widget::make()
			->type('progress')
			->class('card border-0 text-white bg-primary h5 p-1')
			->progressClass('progress-bar')
			->value($user)
			->description('utilisateurs')
			->progress(100*(int)$user/200),
			// ->hint('+ '.(200-$userCount).' jusqu\'au prochain jalon.'),
		Widget::make([
			'type' => 'progress',
			'class'=> 'card border-0 text-black bg-secondary p-3 h4',
			'progressClass' => 'progress-bar',
			'value' => $salle,
			'description' => 'Salles',
		]),

	    Widget::make([
			'type' => 'progress',
			'class'=> 'card border-0 text-white bg-dark h4',
			'progressClass' => 'progress-bar',
			'value' => $departement,
			'description' => 'Départements',
			'progress' => (int)$departement/75*100,
			// 'hint' => $produitCount>75?'Excellent.':'continuons...',
		]),
		Widget::make([
			'type' => 'progress',
			'class'=> 'card border-0 text-white bg-success p-3 h4',
			'progressClass' => 'progress-bar',
			'value' => $reservation,
			'description' => "Reservations",
		]),

	]);

  Widget::add()->to('before_content')->type('div')->class('row')->content([
  Widget::make([
    'type'       => 'chart',
    'controller' => \App\Http\Controllers\Admin\Charts\WeeklyReservationChartController::class,

    // OPTIONALS

    'class'   => 'card mb-2',
    'wrapper' => ['class'=> 'col-md-12'] ,
    'content' => [
         'header' => 'NOUVELLES ENTREES ',
         'body'   => 'Reservation sur les 7 dernier jour <br>',
    ],
]),

]);
//  widget::add(
// 	[
// 		        'type' => 'chart',
// 		        'wrapperClass' => 'col-md-6',
// 		        // 'class' => 'col-md-6',
// 		        'controller' => \App\Http\Controllers\Admin\Charts\CountChartController::class,
// 				'content' => [
// 				    'header' => 'EFFECTIFS', // optional
// 				    // 'body' => 'This chart should make it obvious how many new users have signed up in the past 7 days.<br><br>', // optional
// 		    	]
// 	    	],
//  )
@endphp

@section('content')
	{{-- In case widgets have been added to a 'content' group, show those widgets. --}}
	@include(backpack_view('inc.widgets'), [ 'widgets' => app('widgets')->where('group', 'content')->toArray() ])
@endsection

