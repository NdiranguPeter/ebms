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

Route::get('/', 'PagesController@index')->middleware('auth');
Route::get('/rte', 'PagesController@rte')->middleware('auth');
Route::get('/meal', 'PagesController@meal')->middleware('auth');
Route::get('/export_report', 'PagesController@test')->middleware('auth');
Route::get('/years/{id}', 'PagesController@years')->middleware('auth');
Route::get('/planning/{id}', 'PagesController@planning')->middleware('auth');
Route::get('/me/{id}', 'PagesController@me')->middleware('auth');
Route::get('/settings', 'PagesController@settings')->middleware('auth');
Route::post('/dip/before', 'PagesController@dipbefore')->middleware('auth');
Route::post('/dip/after', 'PagesController@dipafter')->middleware('auth');
Route::get('/logfr/{id}', 'PagesController@logfr')->middleware('auth');
Route::get('/budget/{id}', 'PagesController@budget')->middleware('auth');
Route::get('/bva/{id}', 'PagesController@bva')->middleware('auth');
Route::get('/beneficiary/{id}/{year}', 'PagesController@beneficiary')->middleware('auth');
Route::get('/benefi/{id}/{year}', 'PagesController@benefi')->middleware('auth');

Route::get('/risk/before/{id}', 'PagesController@riskbefore')->middleware('auth');
Route::get('/risk/after/{id}', 'PagesController@riskafter')->middleware('auth');
Route::get('/assumption/before/{id}', 'PagesController@assumptionbefore')->middleware('auth');
Route::get('/assumption/after/{id}', 'PagesController@assumptionafter')->middleware('auth');

Route::get('/pars/{id}', 'PagesController@pars')->middleware('auth');
Route::get('/qntype/{id}', 'QuestionsController@qntype')->middleware('auth');
Route::post('/qntype/{id}', 'QuestionsController@storeType')->middleware('auth');


Route::get('/repo/{id}', 'PagesController@repo')->middleware('auth');
Route::get('/jan/repo/{id}/{year}', 'PagesController@janrepo')->middleware('auth');
Route::get('/feb/repo/{id}/{year}', 'PagesController@febrepo')->middleware('auth');
Route::get('/mar/repo/{id}/{year}', 'PagesController@marrepo')->middleware('auth');
Route::get('/apr/repo/{id}/{year}', 'PagesController@aprrepo')->middleware('auth');
Route::get('/may/repo/{id}/{year}', 'PagesController@mayrepo')->middleware('auth');
Route::get('/jun/repo/{id}/{year}', 'PagesController@junrepo')->middleware('auth');
Route::get('/jul/repo/{id}/{year}', 'PagesController@julrepo')->middleware('auth');
Route::get('/aug/repo/{id}/{year}', 'PagesController@augrepo')->middleware('auth');
Route::get('/sep/repo/{id}/{year}', 'PagesController@seprepo')->middleware('auth');
Route::get('/oct/repo/{id}/{year}', 'PagesController@octrepo')->middleware('auth');
Route::get('/nov/repo/{id}/{year}', 'PagesController@novrepo')->middleware('auth');
Route::get('/dec/repo/{id}/{year}', 'PagesController@decrepo')->middleware('auth');

Route::get('/qrt1/repo/{id}/{year}', 'PagesController@qrt1repo')->middleware('auth');
Route::get('/qrt2/repo/{id}/{year}', 'PagesController@qrt2repo')->middleware('auth');
Route::get('/qrt3/repo/{id}/{year}', 'PagesController@qrt3repo')->middleware('auth');
Route::get('/qrt4/repo/{id}/{year}', 'PagesController@qrt4repo')->middleware('auth');
Route::get('/yearly/repo/{id}/{year}', 'PagesController@yearlyrepo')->middleware('auth');

Route::get('/logframe/{id}', 'PagesController@logframe')->middleware('auth');

Route::get('/reports/{id}', 'PagesController@reports')->middleware('auth');
Route::get('/perfomance/{id}/{year}', 'PagesController@perfomance')->middleware('auth');

Route::get('/outcomes/create/{id}', 'OutcomesController@createOutcome')->middleware('auth');
Route::get('/outputs/create/{id}', 'OutputsController@createOutput')->middleware('auth');
Route::get('/activities/create/{id}', 'ActivitiesController@createActivity')->middleware('auth');
Route::get('/details/output/{id}', 'PagesController@outputdetails')->middleware('auth');
Route::get('/details/outcome/{id}', 'PagesController@outcomedetails')->middleware('auth');
Route::get('/details/activity/{id}', 'PagesController@activitydetails')->middleware('auth');

Route::get('/outputs/dip/{id}', 'OutputsController@export_dip')->name('exportdip')->middleware('auth');
Route::get('/reports/logframe/{id}', 'ProjectsController@export_logframe')->name('exportlogframe')->middleware('auth');
Route::get('/reports/monthly/{id}', 'ProjectsController@export_monthly')->name('exportmonthly')->middleware('auth');

Route::get('/projects/export/{id}', 'ProjectsController@export_Project')->name('exportproject')->middleware('auth');
Route::get('/allprojects', 'ProjectsController@allprojects')->middleware('auth');

Route::get('/activities/before/{id}', 'ActivitiesController@before')->middleware('auth');
Route::get('/activities/after/{id}', 'ActivitiesController@after')->middleware('auth');

Route::get('/indicators/before/{id}', 'IndicatorsController@before')->middleware('auth');

Route::get('/indicators/after/{id}', 'IndicatorsController@after')->middleware('auth');

Route::get('downloadProjectProfle', 'PrintReportsController@index')->middleware('auth');

Route::get('/risks/goal/{id}', 'RisksController@goal')->middleware('auth');
Route::get('/risks/goal/create/{id}', 'RisksController@goalRisk')->middleware('auth');

Route::get('/resources/create/{id}', 'ResourcesController@selectActivity')->middleware('auth');
Route::get('/verifiablesource/create/{id}', 'VerificationsourcesController@selectIndicator')->middleware('auth');

Route::get('/risks/outcome/{id}', 'RisksController@outcome')->middleware('auth');
Route::get('/risks/outcome/create/{id}', 'RisksController@outcomeRisk')->middleware('auth');

Route::get('/risks/output/{id}', 'RisksController@output')->middleware('auth');
Route::get('/risks/output/create/{id}', 'RisksController@outputRisk')->middleware('auth');

Route::get('/risks/activity/{id}', 'RisksController@activity')->middleware('auth');
Route::get('/risks/activity/create/{id}', 'RisksController@activityRisk')->middleware('auth');

Route::get('/assumptions/goal/{id}', 'AssumptionsController@goal')->middleware('auth');
Route::get('/assumptions/goal/create/{id}', 'AssumptionsController@goalAssumption')->middleware('auth');

Route::get('/assumptions/outcome/{id}', 'AssumptionsController@outcome')->middleware('auth');
Route::get('/assumptions/outcome/create/{id}', 'AssumptionsController@outcomeAssumption')->middleware('auth');

Route::get('/assumptions/output/{id}', 'AssumptionsController@output')->middleware('auth');
Route::get('/assumptions/output/create/{id}', 'AssumptionsController@outputAssumption')->middleware('auth');

Route::get('/assumptions/activity/{id}', 'AssumptionsController@activity')->middleware('auth');
Route::get('/assumptions/activity/create/{id}', 'AssumptionsController@activityAssumption')->middleware('auth');

Route::get('/indicators/outcome/create/{id}', 'IndicatorsController@createOutcomeIndicator')->middleware('auth');
Route::get('/indicators/get/{id}', 'IndicatorsController@getIndicator')->middleware('auth');
Route::get('/indicators/goal/create/{id}', 'IndicatorsController@createGoalIndicator')->middleware('auth');
Route::get('/indicators/output/create/{id}', 'IndicatorsController@createOutputIndicator')->middleware('auth');

Route::get('/activities/output/{id}', 'ActivitiesController@showOutputActivities')->middleware('auth');

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');
Route::get('/regional', 'HomeController@regional')->middleware('auth');
// Route::get('/unauthenticated', 'PagesController@unauthenticated');

Route::resource('countries', 'CountriesController')->middleware('auth');

Route::resource('projects', 'ProjectsController')->middleware('auth');

Route::resource('surveys', 'SurveysController')->middleware('auth');
Route::get('/questions/{survey_id}', 'QuestionsController@show')->middleware('auth');
Route::get('/options/{qn_id}', 'QuestionsController@options')->middleware('auth');
Route::get('/data/{survey_id}', 'QuestionsController@data')->middleware('auth');
Route::get('/questions/{question_id}/delete', 'QuestionsController@destroy')->middleware('auth');
// Route::get('/groups/{group_id}/delete', 'GroupsController@destroy')->middleware('auth');
Route::get('/challenges/{challenge_id}/delete', 'ChallengesController@destroy')->middleware('auth');
Route::get('/skip/{qn_id}/delete', 'SkipController@destroy')->middleware('auth');
Route::get('/questions/{question_id}/duplicate', 'QuestionsController@duplicate')->middleware('auth');

Route::resource('questions', 'QuestionsController')->middleware('auth');
Route::resource('outcomes', 'OutcomesController')->middleware('auth');

Route::resource('outputs', 'OutputsController')->middleware('auth');

Route::resource('activities', 'ActivitiesController')->middleware('auth');

Route::resource('indicators', 'IndicatorsController')->middleware('auth');
Route::resource('partners', 'PartnersController')->middleware('auth');
Route::resource('activityafter', 'ActivitiesAfterController')->middleware('auth');

Route::resource('risks', 'RisksController')->middleware('auth');
Route::resource('assumptions', 'AssumptionsController')->middleware('auth');
Route::resource('verificationsources', 'VerificationsourcesController')->middleware('auth');
Route::resource('resources', 'ResourcesController')->middleware('auth');

Route::resource('indicatorsafter', 'IndicatorsafterController')->middleware('auth');

Route::resource('sectors', 'SectorsController')->middleware('auth');
Route::resource('donors', 'DonorsController')->middleware('auth');
Route::resource('currencies', 'CurrenciesController')->middleware('auth');
Route::resource('deliverables', 'DeliverablesController')->middleware('auth');
Route::resource('activityscoring', 'ActivityscoringController')->middleware('auth');
Route::resource('risksafter', 'RisksAfterController')->middleware('auth');
Route::resource('assumptionsafter', 'AssuptionsAfterController')->middleware('auth');
Route::resource('groups', 'GroupsController')->middleware('auth');
Route::resource('targetgroups', 'TargetgoupsController')->middleware('auth');
Route::resource('challenges', 'ChallengesController')->middleware('auth');
Route::resource('skip', 'SkipController')->middleware('auth');
Route::resource('unit', 'UnitsController')->middleware('auth');
Route::get('copy', 'PrintReportsController@index');

Route::post('/before', 'IndicatorsController@before2');
Route::post('/activity/before', 'ActivitiesController@before2');
Route::get('/sendemail', 'SendEmailController@index');
Route::post('/sendemail/send', 'SendEmailController@send');

