<?php

/**
 * Copyright 2016 LINE Corporation
 *
 * LINE Corporation licenses this file to you under the Apache License,
 * version 2.0 (the "License"); you may not use this file except in compliance
 * with the License. You may obtain a copy of the License at:
 *
 *   https://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations
 * under the License.
 */

require_once('./LINEBotTiny.php');



$channelAccessToken = getenv('LINE_CHANNEL_ACCESSTOKEN');
$channelSecret = getenv('LINE_CHANNEL_SECRET');

$client = new LINEBotTiny($channelAccessToken, $channelSecret);
foreach ($client->parseEvents() as $event) {
    switch ($event['type']) {
        case 'message':
            $message = $event['message'];
            $source = $event['source'];
            $user = $source['userId'] ;
            $group = $source['groupId'] ;
            switch ($message['type']) {
                case 'text':
                	$m_message = $message['text'];
                	if($m_message=="123")
                	{
                		$client->replyMessage(array(
                        'replyToken' => $event['replyToken'],
                        'messages' => array(
                            array(
                                'type' => 'text',
                                'text' => $m_message."123"
                            )
                        )
                    	));
                	}
                    elseif($m_message=="456")
                    {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $m_message."45645646"
                                )
                            )
                        ));
                    }
                    elseif($m_message=="jsontest")
                    {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => json_encode($client->parseEvents())
                                )
                            )
                        ));
                    }
                    elseif($m_message=="grouptest")
                    {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $group
                                )
                            )
                        ));
                    }
                    elseif($m_message=="usertest")
                    {
                        $client->replyMessage(array(
                            'to' => $user,
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $user
                                )
                            )
                        ));
                    }
                    break;


                case "image" :
                    $content_type = "圖片訊息";
                    $m_message = $message['type'];   // 讀取圖片內容
                    $data = ['replyToken' => $event['replyToken'], "messages" => array(["type" => "image", "originalContentUrl" => $m_message, "previewImageUrl" => $m_message])];
                    $client->replyMessage($data);
                    break;

                case "video" :
                    $content_type = "影片訊息";
                    $m_message = $message['mp4'];   // 讀取影片內容
                    $data = ['replyToken' => $event['replyToken'], "messages" => array(["type" => "video", "originalContentUrl" => $m_message, "previewImageUrl" => $m_message])];
                    $client->replyMessage($data);
                    break;

                case "audio" :
                    $content_type = "語音訊息";
                    $m_message = $message['mp3'];   // 讀取聲音內容
                    $data = ['replyToken' => $event['replyToken'], "messages" => array(["type" => "audio", "originalContentUrl" => $m_message[0], "duration" => $m_message[1]])];
                    $client->replyMessage($data);
                    break;
            }
            break;
        default:
            error_log("Unsupporeted event type: " . $event['type']);
            break;
    }
};
