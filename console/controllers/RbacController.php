<?php
namespace console\controllers;

use Yii;
use yii\helpers\Console;

class RbacController extends \yii\console\Controller {

 public function actionInit(){

  {
      $auth = Yii::$app->authManager;
      $auth->removeAll();
      Console::output('Removing All! RBAC.....');

      $createPost = $auth->createPermission('createVisa');
      $createPost->description = 'สร้าง visa';
      $auth->add($createPost);

      $updatePost = $auth->createPermission('updateVisa');
      $updatePost->description = 'แก้ไข visa';
      $auth->add($updatePost);

      // เพิ่ม permission loginToBackend <<<------------------------
      $loginToBackend = $auth->createPermission('loginToBackend');
      $loginToBackend->description = 'ล็อกอินเข้าใช้งานส่วน backend';
      $auth->add($loginToBackend);

      $manageUser = $auth->createRole('ManageUser');
      $manageUser->description = 'จัดการข้อมูลผู้ใช้งาน';
      $auth->add($manageUser);

      $employee = $auth->createRole('Employee');
      $employee->description = 'พนักงาน';
      $auth->add($employee);

      $management = $auth->createRole('Management');
      $management->description = 'จัดการข้อมูลผู้ใช้งานและบทความ';
      $auth->add($management);

      $admin = $auth->createRole('Admin');
      $admin->description = 'สำหรับการดูแลระบบ';
      $auth->add($admin);

      $rule = new \common\rbac\EmployeeRule;
      $auth->add($rule);

      $updateOwnPost = $auth->createPermission('updateOwnPost');
      $updateOwnPost->description = 'แก้ไขบทความตัวเอง';
      $updateOwnPost->ruleName = $rule->name;
      $auth->add($updateOwnPost);

      $auth->addChild($employee,$createPost);
      //$auth->addChild($updateOwnPost, $updatePost);
     // $auth->addChild($employee, $updateOwnPost);

      // addChild role ManageUser <<<------------------------
      $auth->addChild($manageUser, $loginToBackend);
$auth->addChild($manageUser, $employee);
      $auth->addChild($management, $manageUser);
      $auth->addChild($management, $employee);

      $auth->addChild($admin, $management);

      $auth->assign($admin, 1);
      $auth->assign($management, 2);
      $auth->assign($manageUser, 3);
      $auth->assign($employee, 4);
      $auth->assign($employee, 5);

      Console::output('Success! RBAC roles has been added.');
    }

}
}
?>