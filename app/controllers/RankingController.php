<?php
/**
 * Created by IntelliJ IDEA.
 * User: Peyman Zeynali
 * Date: 4/15/2016
 * Time: 11:05 AM
 */

namespace QUIZUP\Controllers;


class RankingController  extends ControllerBase
{
    public function initialize(){
        parent::initialize();
    }
    public function indexAction(){

        $users = User::find() or array();
        $rankings = array_reverse(usort($users, 'ranking_sort'));
        $three_most_rankings = array_slice($rankings, 0, 3);
        $this->view->setVar('rankings', $three_most_rankings);
    }
    function ranking_sort($a,$b)
    {
        if ($a['points']==$b['points']) return 0;
        return ($a['points']<$b['points'])?-1:1;
    }
    public function moreAction(){

        $users = User::find() or array();
        $rankings = array_reverse(usort($users, 'ranking_sort'));

        $this->view->setVar('rankings', $rankings);
    }
}