<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::get('/', 'PagesController@index');
Route::get('/rte', 'PagesController@rte');
Route::get('/meal', 'PagesController@meal');
Route::get('/test', 'PagesController@test');
Route::get('/years/{id}', 'PagesController@years');
Route::get('/planning/{id}', 'PagesController@planning');
Route::get('/me/{id}', 'PagesController@me');
Route::get('/settings', 'PagesController@settings');
Route::get('/dip/before/{id}', 'PagesController@dipbefore');
Route::get('/dip/after/{id}', 'PagesController@dipafter');
Route::get('/logfr/{id}', 'PagesController@logfr');
Route::get('/budget/{id}', 'PagesController@budget');
Route::get('/bva/{id}', 'PagesController@bva');
Route::get('/beneficiary/{id}/{year}', 'PagesController@beneficiary');
Route::get('/benefi/{id}/{year}', 'PagesController@benefi');

Route::get('/risk/before/{id}', 'PagesController@riskbefore');
Route::get('/risk/after/{id}', 'PagesController@riskafter');
Route::get('/assumption/before/{id}', 'PagesController@assumptionbefore');
Route::get('/assumption/after/{id}', 'PagesController@assumptionafter');

Route::get('/pars/{id}', 'PagesController@pars');
Route::get('/qntype/{id}', 'QuestionsController@qntype');
Route::post('/qntype/{id}', 'QuestionsController@storeType');

Route::get('/repo/{id}', 'PagesController@repo');
Route::get('/jan/repo/{id}/{year}', 'PagesController@janrepo');
Route::get('/feb/repo/{id}/{year}', 'PagesController@febrepo');
Route::get('/mar/repo/{id}/{year}', 'PagesController@marrepo');
Route::get('/apr/repo/{id}/{year}', 'PagesController@aprrepo');
Route::get('/may/repo/{id}/{year}', 'PagesController@mayrepo');
Route::get('/jun/repo/{id}/{year}', 'PagesController@junrepo');
Route::get('/jul/repo/{id}/{year}', 'PagesController@julrepo');
Route::get('/aug/repo/{id}/{year}', 'PagesController@augrepo');
Route::get('/sep/repo/{id}/{year}', 'PagesController@seprepo');
Route::get('/oct/repo/{id}/{year}', 'PagesController@octrepo');
Route::get('/nov/repo/{id}/{year}', 'PagesController@novrepo');
Route::get('/dec/repo/{id}/{year}', 'PagesController@decrepo');

Route::get('/qrt1/repo/{id}/{year}', 'PagesController@qrt1repo');
Route::get('/qrt2/repo/{id}/{year}', 'PagesController@qrt2repo');
Route::get('/qrt3/repo/{id}/{year}', 'PagesController@qrt3repo');
Route::get('/qrt4/repo/{id}/{year}', 'PagesController@qrt4repo');
Route::get('/yearly/repo/{id}/{year}', 'PagesController@yearlyrepo');

Route::get('/logframe/{id}', 'PagesController@logframe');

Route::get('/reports/{id}', 'PagesController@reports');
Route::get('/perfomance/{id}/{year}', 'PagesController@perfomance');

Route::get('/outcomes/create/{id}', 'OutcomesController@createOutcome');
Route::get('/outputs/create/{id}', 'OutputsController@createOutput');
Route::get('/activities/create/{id}', 'ActivitiesController@createActivity');
Route::get('/details/output/{id}', 'PagesController@outputdetails');
Route::get('/details/outcome/{id}', 'PagesController@outcomedetails');
Route::get('/details/activity/{id}', 'PagesController@activitydetails');

Route::get('/outputs/dip/{id}', 'OutputsController@export_dip')->name('exportdip');
Route::get('/reports/logframe/{id}', 'ProjectsController@export_logframe')->name('exportlogframe');
Route::get('/reports/monthly/{id}', 'ProjectsController@export_monthly')->name('exportmonthly');

Route::get('/projects/export/{id}', 'ProjectsController@export_Project')->name('exportproject');

Route::get('/activities/before/{id}', 'ActivitiesController@before');
Route::get('/activities/after/{id}', 'ActivitiesController@after');

Route::get('/indicators/before/{id}', 'IndicatorsController@before');
Route::get('/indicators/after/{id}', 'IndicatorsController@after');

Route::get('downloadProjectProfle', 'PrintReportsController@index');

Route::get('/risks/goal/{id}', 'RisksController@goal');
Route::get('/risks/goal/create/{id}', 'RisksController@goalRisk');

Route::get('/resources/create/{id}', 'ResourcesController@selectActivity');
Route::get('/verifiablesource/create/{id}', 'VerificationsourcesController@selectIndicator');

Route::get('/risks/outcome/{id}', 'RisksController@outcome');
Route::get('/risks/outcome/create/{id}', 'RisksController@outcomeRisk');

Route::get('/risks/output/{id}', 'RisksController@output');
Route::get('/risks/output/create/{id}', 'RisksController@outputRisk');

Route::get('/risks/activity/{id}', 'RisksController@activity');
Route::get('/risks/activity/create/{id}', 'RisksController@activityRisk');

Route::get('/assumptions/goal/{id}', 'AssumptionsController@goal');
Route::get('/assumptions/goal/create/{id}', 'AssumptionsController@goalAssumption');

Route::get('/assumptions/outcome/{id}', 'AssumptionsController@outcome');
Route::get('/assumptions/outcome/create/{id}', 'AssumptionsController@outcomeAssumption');

Route::get('/assumptions/output/{id}', 'AssumptionsController@output');
Route::get('/assumptions/output/create/{id}', 'AssumptionsController@outputAssumption');

Route::get('/assumptions/activity/{id}', 'AssumptionsController@activity');
Route::get('/assumptions/activity/create/{id}', 'AssumptionsController@activityAssumption');

Route::get('/indicators/outcome/create/{id}', 'IndicatorsController@createOutcomeIndicator');
Route::get('/indicators/goal/create/{id}', 'IndicatorsController@createGoalIndicator');
Route::get('/indicators/output/create/{id}', 'IndicatorsController@createOutputIndicator');

Route::get('/activities/output/{id}', 'ActivitiesController@showOutputActivities');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/regional', 'HomeController@regional');
// Route::get('/unauthenticated', 'PagesController@unauthenticated');

Route::resource('countries', 'CountriesController');

Route::resource('projects', 'ProjectsController');

Route::resource('surveys', 'SurveysController');
Route::get('/questions/{survey_id}', 'QuestionsController@show');
Route::get('/data/{survey_id}', 'QuestionsController@data');
Route::get('/questions/{question_id}/delete', 'QuestionsController@destroy');
Route::get('/groups/{group_id}/delete', 'GroupsController@destroy');
Route::get('/questions/{question_id}/duplicate', 'QuestionsController@duplicate');

Route::resource('questions', 'QuestionsController');
Route::resource('outcomes', 'OutcomesController');

Route::resource('outputs', 'OutputsController');

Route::resource('activities', 'ActivitiesController');

Route::resource('indicators', 'IndicatorsController');
Route::resource('partners', 'PartnersController');
Route::resource('activityafter', 'ActivitiesAfterController');

Route::resource('risks', 'RisksController');
Route::resource('assumptions', 'AssumptionsController');
Route::resource('verificationsources', 'VerificationsourcesController');
Route::resource('resources', 'ResourcesController');

Route::resource('indicatorsafter', 'IndicatorsafterController');

Route::resource('sectors', 'SectorsController');
Route::resource('donors', 'DonorsController');
Route::resource('currencies', 'CurrenciesController');
Route::resource('deliverables', 'DeliverablesController');
Route::resource('risksafter', 'RisksAfterController');
Route::resource('assumptionsafter', 'AssuptionsAfterController');
Route::resource('groups', 'GroupsController');
