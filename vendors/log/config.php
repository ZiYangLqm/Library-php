<?php
#
# Licensed to the Apache Software Foundation (ASF) under one or more
# contributor license agreements. See the NOTICE file distributed with
# this work for additional information regarding copyright ownership.
# The ASF licenses this file to You under the Apache License, Version 2.0
# (the "License"); you may not use this file except in compliance with
# the License. You may obtain a copy of the License at
#
#         http://www.apache.org/licenses/LICENSE-2.0
#
# Unless required by applicable law or agreed to in writing, software
# distributed under the License is distributed on an "AS IS" BASIS,
# WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
# See the License for the specific language governing permissions and
# limitations under the License.
#
return array(
        'threshold' => 'ALL',
        'rootLogger' => array(
            'level' => 'WARN',
            'appenders' => array('default'),
        ),
        'loggers' => array(
          
            //日志
            'log' => array(
            		'level' => 'TRACE',
            		'appenders' => array('sfkcLog'),
            ),
     
            //推送消息日志
//             'wxApiLog' => array(
//                     'level' => 'TRACE',
//                     'appenders' => array('wxApiLog'),
//             ),

//         ),
//         'appenders' => array(
//             'default' => array(
//                 'class' => 'CustomAppenderFile',
//                 'layout' => array(
//                     'class' => 'LoggerLayoutPattern',
//                     'conversionPattern' => "%d{Y-m-d H:i:s} %-5p %c %X{username}: %m in %C.%M(%F:%L) %n",
//                 ),
//                 'params' => array(
// 		                'file' => HOST_ROOT.'/../log/'.date("Ymd",time()).'/'.date("Y_m_d",time()).'.error.log',
//                 ),
//             ),
           
//             'sfkcLog' => array(
//             		'class' => 'CustomAppenderFile',
//             		'layout' => array(
//             				'class' => 'LoggerLayoutPattern',
//             				'params' => array(
//             						'conversionPattern' =>"%d{Y-m-d H:i:s.u} pid[%pid] ip:%server{REMOTE_ADDR}:%server{REMOTE_PORT}   %-5p: %m (%C.%M:%L) %n",
//             				),
//             		),
//             		'params' => array(
//             				'file' => HOST_ROOT.'/../log/'.date("Ymd",time()).'/'.date("Y_m_d",time()).'.sfkcLog.log',
//             		),
//             ),
         
//             'wxApiLog' => array(
//             		'class' => 'CustomAppenderFile',
//             		'layout' => array(
//             				'class' => 'LoggerLayoutPattern',
//             				'params' => array(
//             						'conversionPattern' =>"%d{Y-m-d H:i:s.u} pid[%pid] ip:%server{REMOTE_ADDR}:%server{REMOTE_PORT}   %-5p: %m (%C.%M:%L) %n",
//             				),
//             		),
//             		'params' => array(
//             				'file' => HOST_ROOT.'/../log/'.date("Ymd",time()).'/'.date("Y_m_d",time()).'.wxApiLog.log',
//             		),
//             ),
        

        ),
    );
