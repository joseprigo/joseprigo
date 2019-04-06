<?php
require_once 'core/BaseModel.php';
/**
 * Description of NoticiesModel
 *
 * @author josep
 */
class ArticleModel extends BaseModel{
     
    public function __construct(){
        parent::__construct("news", "Article");
    }
    
    /**
     * Gets one article given its id and a language
     * @return boolean
     */
    public function selectOne($a_params){
        $queryText = "SELECT news.id_article, news.creation, news.edit, news_lang.title, news_lang.text FROM news
                left join news_lang USING(id_article)
                WHERE news_lang.id_lang = ?
                AND id_article = ?";
        $queryMedia = "SELECT media.id_media, media.name, media.type, media.priority, media.link, media_lang.media_description
                FROM m edia LEFT join media_lang USING (id_media)
                WHERE media_lang.id_lang = ?
                AND id_article = ?
                ORDER BY media.type, media.priority";
        $article = $this->select($queryText,$a_params);
        $medias = $this->select($queryMedia, $a_params);
        return array("body" => $article, "resources" => $medias);
    }
    
    public function selectMany($a_params){
//        $str_type = "i";
//        $lang_id = 94;
//        $a_params = array($str_type, $lang_id);
        $query="SELECT news.id_article, news.creation, news.edit, news_lang.title, news_lang.text FROM news
                left join news_lang USING(id_article)
                WHERE news_lang.id_lang = ?";
        $noticies=$this->select($query, $a_params);
        return $noticies;
    }
    
    /**
     * S'utilitza al carregar tots els articles en un idioma concret, per exemple
     * al carregar l'index del lloc web.
     * @param type $a_params
     * @return type
     */
    public function selectAll($a_params){
        $query = "SELECT news.id_article, news.creation, news.edit, news_lang.title, news_lang.text FROM `news`
        LEFT JOIN news_lang USING(id_article)
        WHERE id_lang = ?
        ORDER BY news.creation DESC";
        $news=$this->select($query, $a_params);
        return $news;
        
    }
}
?>