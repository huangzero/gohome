<?php

defined('IN_IA') or exit('Access Denied');
class mistan_fjpModuleSite extends WeModuleSite
{
	public function doMobileIndex()
	{
		defined('IN_IA') or exit('Access Denied');
		global $_GPC, $_W;


        if (empty($_W['fans']['nickname'])) {
            mc_oauth_userinfo();
        }

        if (empty($_W['openid'])) {
               // header("Location:".$this->createMobileUrl('list',array()));
               message('请在微信中打开');
        }

        $fans = pdo_fetch("SELECT * FROM " . tablename("gohome_fans") . " WHERE openid = :openid and weid = :weid ", array(':openid' => $_W['openid'], ':weid' => $_W['uniacid']));    

    
        if(empty($fans)){
             $insert = array(
                'weid'=>$_W['uniacid'],
                'openid' => $_W['openid'],
                'headimgurl' =>$_W['fans']['avatar'],
                'nickname' => $_W['fans']['nickname']
            );
             pdo_insert('gohome_fans', $insert);
             $uid = pdo_insertid();
        }else{
            $uid = $fans['id'];
        }

        $url="http://test.gdzszero.com/app/index.php?c=entry&do=helpindex&i=8&m=mistan_fjp&share_from=".$_W['openid'];


         $fansAllist = pdo_fetchall("SELECT * FROM " . tablename("gohome_fans") . " WHERE  weid = :weid ORDER BY km desc LIMIT 0,50  ", array( ':weid' => $_W['uniacid']));    



        $share_from = $_GPC['share_from'];//分享的人
        //$share_from = base64_decode(urldecode($_GPC['share_form']));
       
            if (!empty($share_from) && !empty($_W['openid']) && $share_from != $_W['openid']) {//判断不是自己分享给自己

                $share_log = pdo_fetch("SELECT * FROM ".tablename("gohome_share")." WHERE weid=:weid AND openid=:openid AND share_from=:share_from",array(':weid'=>$_W['uniacid'],':openid'=>$_W['openid'],':share_from'=>$share_from));

                if (empty($share_log)) {
                    $insert1 = array(
                        'weid' => $_W['uniacid'],
                        'openid' => $_W['openid'],
                        'share_from' => $share_from,
                        'share_time' => time()
                        );
                    pdo_insert('gohome_share', $insert1);

                    $myfans = pdo_fetch("SELECT * FROM " . tablename("gohome_fans") . " WHERE openid = :openid and weid = :weid ", array(':openid' => $share_from, ':weid' => $_W['uniacid'])); 
                    pdo_update("gohome_fans", array('km'=>$myfans['km'] + 10), array('openid'=>$share_from));
                }
                
        
            }
            

		$copyright = $this->module['config']['copyright'];
		$img = tomedia($this->module['config']['img']);
		$pic = $_W['siteroot'] . "addons/mistan_fjp/icon.jpg";
		$mistanurl = $_W['siteroot'] . "addons/mistan_fjp/template/mobile/";
		include $this->template('index');
	}

		public function doMobilelist() 
	{

		global $_GPC, $_W;


		if (empty($_W['fans']['nickname'])) {
			mc_oauth_userinfo();
		}

        if (empty($_W['openid'])) {
               // header("Location:".$this->createMobileUrl('list',array()));
               message('调试中');
        }

        $fans = pdo_fetch("SELECT * FROM " . tablename("gohome_fans") . " WHERE openid = :openid and weid = :weid ", array(':openid' => $_W['openid'], ':weid' => $_W['uniacid']));    

    
        if(empty($fans)){
             $insert = array(
                'weid'=>$_W['uniacid'],
                'openid' => $_W['openid'],
                'headimgurl' =>$_W['fans']['avatar'],
                'nickname' => $_W['fans']['nickname']
            );
             pdo_insert('gohome_fans', $insert);
             $uid = pdo_insertid();
        }else{
        	$uid = $fans['id'];
        }

        $nickname = $_W['fans']['nickname']."请你助我回家";
        $url="http://test.gdzszero.com/app/index.php?c=entry&do=helpindex&i=8&m=mistan_fjp&share_from=".$_W['openid'];


		 $fansAllist = pdo_fetchall("SELECT * FROM " . tablename("gohome_fans") . " WHERE  weid = :weid ORDER BY km desc LIMIT 0,50  ", array( ':weid' => $_W['uniacid']));    



        $share_from = $_GPC['share_from'];//分享的人
        //$share_from = base64_decode(urldecode($_GPC['share_form']));
       
            if (!empty($share_from) && !empty($_W['openid']) && $share_from != $_W['openid']) {//判断不是自己分享给自己

                $share_log = pdo_fetch("SELECT * FROM ".tablename("gohome_share")." WHERE weid=:weid AND openid=:openid AND share_from=:share_from",array(':weid'=>$_W['uniacid'],':openid'=>$_W['openid'],':share_from'=>$share_from));

                if (empty($share_log)) {
                    $insert1 = array(
                        'weid' => $_W['uniacid'],
                        'openid' => $_W['openid'],
                        'share_from' => $share_from,
                        'share_time' => time()
                        );
                    pdo_insert('gohome_share', $insert1);

                    $myfans = pdo_fetch("SELECT * FROM " . tablename("gohome_fans") . " WHERE openid = :openid and weid = :weid ", array(':openid' => $share_from, ':weid' => $_W['uniacid'])); 
                    pdo_update("gohome_fans", array('km'=>$myfans['km'] + 10), array('openid'=>$share_from));
                     
                }
                
        
            }
            
            $help='';  
            if($time!='' && $time==1 && $share_from!=''){
                $help ="正在帮助好友";
                $formopenid =$share_from;//要帮的人 1号
            }
         
        
        
		 $copyright = $this->module['config']['copyright'];

		 $img = tomedia($this->module['config']['img']);

		 $pic= $_W['siteroot']."addons/mistan_fjp/icon.jpg";

		 $mistanurl = $_W['siteroot']."addons/mistan_fjp/template/mobile/";

		include $this->template('list');

	}	



        public function doMobilehelpindex() 
    {

        global $_GPC, $_W;


          $share_from = $_GPC['share_from'];//分享的人
       
            if (!empty($share_from) && !empty($_W['openid']) && $share_from != $_W['openid']) {//判断不是自己分享给自己

                $share_log = pdo_fetch("SELECT * FROM ".tablename("gohome_share")." WHERE weid=:weid AND openid=:openid AND share_from=:share_from",array(':weid'=>$_W['uniacid'],':openid'=>$_W['openid'],':share_from'=>$share_from));

                if (empty($share_log)) {
                    $insert1 = array(
                        'weid' => $_W['uniacid'],
                        'openid' => $_W['openid'],
                        'share_from' => $share_from,
                        'share_time' => time()
                        );
                    pdo_insert('gohome_share', $insert1);

                    $myfans = pdo_fetch("SELECT * FROM " . tablename("gohome_fans") . " WHERE openid = :openid and weid = :weid ", array(':openid' => $share_from, ':weid' => $_W['uniacid'])); 
                    pdo_update("gohome_fans", array('km'=>$myfans['km'] + 10), array('openid'=>$share_from));
                    $nickname = "你已为".$myfans['nickname']."成功助力";
                }else{
                    header("Location:".$this->createMobileUrl('index',array()));
                }
                
        
            }else{
                header("Location:".$this->createMobileUrl('index',array()));

            }

    

         $copyright = $this->module['config']['copyright'];

         $img = tomedia($this->module['config']['img']);

         $pic= $_W['siteroot']."addons/mistan_fjp/icon.jpg";

         $mistanurl = $_W['siteroot']."addons/mistan_fjp/template/mobile/";

        include $this->template('helpindex');

    }   

}