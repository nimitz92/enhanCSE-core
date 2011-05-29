<?php 
require_once(SBINTERFACES);
require_once(SBROOT. 'lib/util/Time.class.php');
require_once(SBROOT. 'lib/util/Random.class.php');

/**
 *	SessionCreateContext class
 *
 *	@param uid					long int			User ID
 *	@param conn 				resource 		Database connection
 *	
 *	@return sessionid	 		string			Session ID generated
 *	@return valid 				boolean		Processed without errors
 *	@return msg					string			Error message if any
 *
**/
class SessionCreateContext implements ContextService {

	/**
	 *	@interface ContextService
	**/
	public function getContext($model){
		$conn = $model['conn'];
		$uid = $model['uid'];

		$sessionid = Random::getString(32); 
		$ts = Time::getTime();
		$ts_exp = $ts + 2592000; // 30 days
		
		$query = "delete from sessions where expiry < $ts;";
		$conn->getResult($query, true);
		
		$query = "insert into sessions values('$sessionid', $uid, $ts, $ts_exp);";
		$result = $conn->getResult($query, true);
		
		if($result === false){
			$model['valid'] = false;
			$model['msg'] = 'Error in Database @getContext/session.create';
			return $model;
		}
		
		$model['valid'] = true;
		$model['sessionid'] = $sessionid;

		return $model;
	}
	
	/**
	 *	@interface ContextService
	**/
	public function setContext($model){
		return $model;
	}
}

?>
