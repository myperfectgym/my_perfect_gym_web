<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\UserForm */

$this->title = $model->username;
$this->params['breadcrumbs'][] = $this->title;
?>

<div class="wraper container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="bg-picture text-center">
                <div class="bg-picture-overlay"></div>
                <div class="profile-info-name">
                    <? if ($model->getImageFile()): ?>
                        <img src="<?= $model->getImageFile()->path?>" class="thumb-lg img-circle img-thumbnail" alt="profile-image">
                     <? endif ?>
                    <h4 class="m-b-5"><b>Chadengle</b></h4>
                    <p class="text-muted"><i class="fa fa-map-marker"></i> New york, United States</p>
                </div>
            </div>
            <!--/ meta -->
        </div>
    </div>


    <div class="row">
        <div class="col-md-4">

            <div class="card-box m-t-20">
                <h4 class="m-t-0 header-title"><b><?= Yii::t('app', 'Personal Information')?></b></h4>
                <div class="p-20">
                    <div class="about-info-p">
                        <strong><?= Yii::t('app', 'Full Name')?></strong>
                        <br>
                        <p class="text-muted">Johnathan Deo</p>
                    </div>
                    <div class="about-info-p">
                        <strong><?= Yii::t('app', 'Mobile')?></strong>
                        <br>
                        <p class="text-muted">(123) 123 1234</p>
                    </div>
                    <div class="about-info-p">
                        <strong><?= Yii::t('app', 'Email')?></strong>
                        <br>
                        <p class="text-muted">johnathan@ubold.com</p>
                    </div>
                </div>
            </div>

            <!-- Personal-Information -->
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b><?= Yii::t('app', 'Biography')?></b></h4>

                <div class="p-20">
                    <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged.</p>

                    <p><strong>But also the leap into electronic typesetting, remaining essentially unchanged.</strong></p>

                    <p>It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                </div>
            </div>
            <!-- Personal-Information -->


            <!-- Personal-Information -->
            <div class="card-box">
                <h4 class="m-t-0 header-title"><b><?= Yii::t('app', 'Skills')?></b></h4>

                <div class="p-20">
                    <div class="m-b-15">
                        <h5>Angular Js <span class="pull-right">60%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-primary wow animated progress-animated" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 60%;">
                                <span class="sr-only">60% Complete</span>
                            </div>
                        </div>
                    </div>

                    <div class="m-b-15">
                        <h5>Javascript <span class="pull-right">90%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-pink wow animated progress-animated" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 90%;">
                                <span class="sr-only">90% Complete</span>
                            </div>
                        </div>
                    </div>

                    <div class="m-b-15">
                        <h5>Wordpress <span class="pull-right">80%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-purple wow animated progress-animated" role="progressbar" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
                                <span class="sr-only">80% Complete</span>
                            </div>
                        </div>
                    </div>

                    <div class="m-b-0">
                        <h5>HTML5 &amp; CSS3 <span class="pull-right">95%</span></h5>
                        <div class="progress">
                            <div class="progress-bar progress-bar-info wow animated progress-animated" role="progressbar" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100" style="width: 95%;">
                                <span class="sr-only">95% Complete</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Personal-Information -->



        </div>


        <div class="col-md-8">

            <div class="card-box m-t-20">
                <h4 class="m-t-0 header-title"><b>Activity</b></h4>
                <div class="p-20">
                    <div class="timeline-2">
                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">5 minutes ago</div>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong> Uploaded a photo <strong>"DSC000586.jpg"</strong></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">30 minutes ago</div>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">59 minutes ago</div>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">5 minutes ago</div>
                                <p><strong><a href="#" class="text-info">John Doe</a></strong>Uploaded 2 new photos</p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">30 minutes ago</div>
                                <p><a href="" class="text-info">Lorem</a> commented your post.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>

                        <div class="time-item">
                            <div class="item-info">
                                <div class="text-muted">59 minutes ago</div>
                                <p><a href="" class="text-info">Jessi</a> attended a meeting with<a href="#" class="text-success">John Doe</a>.</p>
                                <p><em>"Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam laoreet tellus ut tincidunt euismod. "</em></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card-box">
                <h4 class="m-t-0 m-b-20 header-title"><b>My Office</b></h4>

                <div class="gmap">
                    <iframe height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0"
                            src="http://maps.google.co.in/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=Google+India+Bangalore,+Bennigana+Halli,+Bangalore,+Karnataka&amp;aq=0&amp;oq=google+&amp;sll=9.930582,78.12303&amp;sspn=0.192085,0.308647&amp;ie=UTF8&amp;hq=Google&amp;hnear=Bennigana+Halli,+Bangalore,+Bengaluru+Urban,+Karnataka&amp;t=m&amp;ll=12.993518,77.660294&amp;spn=0.012545,0.036006&amp;z=15&amp;output=embed"></iframe>
                </div>
                <br/>
                <div class="gmap-info">
                    <h4><b><a href="#" class="text-dark">Google India Pvt. Ltd</a></b></h4>
                    <p>No. 3, RMZ Infinity - Tower E 3rd, 4th, and 5th Floors, </p>
                    <p>Old Madras Road, </p>
                    <p>Bengaluru, Karnataka 560016,</p>
                    <p>India</p>
                </div>

                <div class="clearfix"></div>
            </div>
        </div>


    </div>

    <div class="row">
        <p>
            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>
    </div>
</div>


