<?php



/**



 * 飞机票生成器模块微站定义



 *



 * @author mistan



 * @url http://bbs.we7.cc/



 */



defined('IN_IA') or exit('Access Denied');

class mistan_fjpModuleSite extends WeModuleSite {

	public function doMobileIndex() {
	global $_GPC, $_W;

 $copyright = $this->module['config']['copyright'];

 $img = tomedia($this->module['config']['img']);

 $pic= $_W['siteroot']."addons/mistan_fjp/icon.jpg";

 $mistanurl = $_W['siteroot']."addons/mistan_fjp/template/mobile/";

include $this->template('index');

	}	

		public function doMobileList() {

		global $_GPC, $_W;
	 $copyright = $this->module['config']['copyright'];

	 $img = tomedia($this->module['config']['img']);

	 $pic= $_W['siteroot']."addons/mistan_fjp/icon.jpg";

	 $mistanurl = $_W['siteroot']."addons/mistan_fjp/template/mobile/";

	include $this->template('list(varname)');

	}	



}