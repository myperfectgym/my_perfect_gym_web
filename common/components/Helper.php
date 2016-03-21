<?
namespace common\components;

use common\models\TrainingsExercise;
use Yii;
use yii\helpers\Html;

class Helper
{
    public static function createHtmlExercise(TrainingsExercise $trainingExercise)
    {
        $content = "";
        $count = 0;
        foreach ($trainingExercise->touch as $touch) {
            $content .= "<tr>";
            $content .= "<th>".++$count."</th>";
            $content .= "<th>".$touch->number."</th>";
            $content .= "<th>".$touch->count."</th>";
            $content .= "<th>".$touch->weight."</th>";
            $content .= "</tr>";
        }

        return "
        <div class='row' id='exercise-$trainingExercise->id'>
            <div class='portlet'>
                    <div class='portlet-heading bg-inverse'>
                        <h3 class='portlet-title'>
                            ".Html::a($trainingExercise->exercise->name, ['/exercise/view', 'id' => $trainingExercise->exercise->id])."
                        </h3>
                        <div class='portlet-widgets'>
                            <a data-toggle='collapse' data-parent='#accordion1' href='#bg-default'><i class='ion-minus-round'></i></a>
                            <span class='divider'></span>
                            <a data-id='$trainingExercise->id' class='remove'><i class='ion-close-round'></i></a>
                        </div>
                        <div class='clearfix'></div>
                    </div>

                    <div id='bg-default' class='panel-collapse collapse in'>
                        <div class='portlet-body'>
                        <table class='table m-0'>
                            <thead>
                                <tr>
                                    <th>".Yii::t('app', 'Number of touch')."</th>
                                    <th>".Yii::t('app', 'Number repeat')."</th>
                                    <th>".Yii::t('app', 'Count')."</th>
                                    <th>".Yii::t('app', 'Weight')."</th>
                                </tr>
                            </thead>
                            <tbody>
                               ".$content."
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>";
    }
}