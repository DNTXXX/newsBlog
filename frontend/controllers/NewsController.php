<?php

namespace frontend\controllers;
use frontend\models\News;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use Yii;
use yii\data\ActiveDataProvider;
use \yii\db\Expression;
use yii\helpers\Url;

class NewsController extends Controller
{
    // public function actionIndex()
    // {
    //     return $this->render('index');
    // }

    public function actionView($category, $url)
    {
        $model = News::findOne(['url' => $url , 'removed' => 0,'deleted' => 0  ]);

        if(!$model){
            throw new NotFoundHttpException('Данной страницы не существует', 404);
        }

        return $this->render('index', ['model' => $model]);
            
        //return $this->render('index');
    }

    public function actionSort()
    {
        $request = Yii::$app->request;
        $get = $request->get();
        
        $category = $get['NewsCategory'];
        $newsCreate_at = $get['News'];


        $sort = $newsCreate_at['created_at'];

        if (empty($category['id']) )  {
        	$model = News::find()
	        	->Where(['moderation'=>0])
	        	->andWhere(['deleted'=>0])
	        	->andWhere(['removed'=>0])
	        	->orderBy(['created_at'=> constant("SORT_$sort")])
	        	/*->all()*/;
        	//throw new NotFoundHttpException('Категория не выбрана');
        	//return $this->render('sort', ['model' => $model]);

        }else{
        	$model = News::find()
	        	->Where(['id_category'=> $category['id']])
	        	->andWhere(['moderation'=>0])
	        	->andWhere(['deleted'=>0])
	        	->andWhere(['removed'=>0])
	        	->orderBy(['created_at'=> constant("SORT_$sort") ])
	        	/*->all()*/;
        }
        // var_dump($category['id']);
        // die;

        $dataProvider = new ActiveDataProvider([
            'query' => $model,
            'pagination' => [
                'pageSize' => 6,
            ],
        ]);

        

        return $this->render('sort', ['model' => $model, 'dataProvider' => $dataProvider ]);
            
        //return $this->render('index');
    }

    public function actionAdd()
    {
        $model = new News();

        if ($model->load(\Yii::$app->request->post()) && $model->validate())
        {

            if($model->isNewRecord)
            {
                $model->created_at = new Expression('NOW()');

                $model->deleted = $model->removed = 0;
                $model->moderation = 1;
            }

            $model->updated_at = new Expression('NOW()');

            if($model->save())
                //return $this->redirect(  Url::to('/list'));

                return $this->redirect( Url::to('success'));
        }

        return $this->render('addnews', [
            'model' => $model,
        ]);
    }

    public function actionSuccess()
    {
        Yii::$app->session->setFlash('success', "Новость сохранена!");
        return $this->render('success');
    }

}
