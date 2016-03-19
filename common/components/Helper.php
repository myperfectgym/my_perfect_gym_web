<?
namespace common\components;

use common\models\TrainingsExercise;
use Yii;

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

        return "<div class='row'>
                    <div class='card-box'>
                        <h4 class='header-title m-t-0'><b>".$trainingExercise->exercise->name."</b></h4>
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
                </div>";
    }
}