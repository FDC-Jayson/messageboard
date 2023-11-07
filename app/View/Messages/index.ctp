
<div ng-app="messageBoard" ng-controller="mainCtrl" ng-init="userId=<?php echo $userData['id'] ?>">

    <div ng-view></div>

</div>


<?php $this->append('script', $this->Html->script('/js/socket.io.min')); ?>
<?php $this->append('script', $this->Html->script('/js/angular.min')); ?>
<?php $this->append('script', $this->Html->script('/js/angular-route')); ?>
<?php $this->append('script', $this->Html->script('/js/messages')); ?>
