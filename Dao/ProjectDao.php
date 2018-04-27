<?php
/**
 * Created by PhpStorm.
 * User: seven
 * Date: 2018/4/26
 * Time: 20:49
 */

namespace Ats\Dao;
//引用类
include("../Conn/conn.php");
use Ats\Conn\Conn;
//对项目的操作
class ProjectDao
{
    //添加训练项目
    static function addProject($project_name,$project_unit,$project_great,$project_good,$project_qualified){
        $SQL_ADD_PROJECT="insert into ats_project(Project_Name,Project_Unit,Project_Great,Project_Good,Project_Qualified)values('$project_name','$project_unit',$project_great,$project_good,$project_qualified)";
        Conn::init();
        $result=Conn::excute($SQL_ADD_PROJECT);
        Conn::close();
        return $result;
    }
    //删除训练项目
    static function deleteProject($project_name){
        $SQL_DELETE_PROJECT="delete from ats_project where Project_Name='$project_name'";
        Conn::init();
        $result=Conn::excute($SQL_DELETE_PROJECT);
        Conn::close();
        return $result;
    }
    //创建新训练项目表
    static function createProjectTable($project_name){
        $table_name="ats_project_$project_name";
        $SQL_CREATE_PROJECT_TABLE="create table $table_name(User_Id int(8),Train_Date date,Train_Score float(8,2),primary key(User_Id,Train_Date),foreign key(User_Id) references ats_User(User_Id))";
        Conn::init();
        $result=Conn::excute($SQL_CREATE_PROJECT_TABLE);
        Conn::close();
        return $result;
    }
    //删除训练项目表
    static function deleteProjectTable($project_name){
        $table_name="ats_project_$project_name";
        $SQL_DELETE_PROJECT_TABLE="drop table $table_name";
        Conn::init();
        $result=Conn::excute($SQL_DELETE_PROJECT_TABLE);
        Conn::close();
        return $result;
    }
}