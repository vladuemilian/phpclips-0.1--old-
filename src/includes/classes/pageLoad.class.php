<?php 
/** 
 * A basic PHP Class to measure page load time 
 * For support issues please refer to the webdigity forums : 
 *                www.webdigity.com 
 * 
 * ============================================================================== 
 *  
 * @version $Id: pageloadtime.class.php,v 1 2007/09/25 22:54:32 $ 
 * @copyright Copyright (c) 2007 Nick Papanotas (http://www.webdigity.com) 
 * @author Nick Papanotas <nikolas@webdigity.com> 
 * @license http://opensource.org/licenses/gpl-license.php GNU General Public License (GPL) 
 *  
 * ============================================================================== 
 */     
 class pageLoad{ 
      var $start; 
      var $end; 
       
      function pageLoad(){ 
           $this->start(); 
      } 
       
      function start(){ 
          $this->start = $this->getTime(); 
      } 
       
      function end(){ 
           $this->end = $this->getTime(); 
      } 
       
      function getLoadTime($format = '%01.5f'){ 
           if (empty($this->end) )$this->end(); 
           return sprintf($format, ($this->end - $this->start)); 
      } 
       
      function getTime(){ 
          $time = microtime(); 
        $time = explode(' ', $time); 
        return $time[1] + $time[0];  
      } 
 }
 
  /*//Example: 
 $Load = new pageLoad; 
 for($i=0;$i<1000000;$i++) 
      $a = $i * ($i/2); 
 echo $Load->getLoadTime(); 
 */
