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
                    elseif($m_message=="購物規則")
                    {
                        $client->replyMessage(array(
                            'replyToken' => $event['replyToken'],
                            'messages' => array(
                                array(
                                    'type' => 'text',
                                    'text' => $m_message."【雪莉衣飾小舖】🌟購物規則🌟
購物前先觀看此文再開始購買噢！
新加入的朋友，
看過購物規則請記得在底下留言回覆　「ＯＫ」　

本館飾品幾乎100元上下(特殊款很美的單價會稍高)，秉持薄利多銷的概念回饋服務大家，拜託喊單勿刪除留言、勿退換、勿棄單、記得取貨！
違規一律踢出群組列永久黑名單
（信用很值錢，勿以身試法）

購物前先觀看這篇文章再開始購買噢！
新加入的朋友，
看過購物規則請記得在底下留言回覆　「ＯＫ」　

本館飾品幾乎100元上下(特殊款很美的單價會稍高)，秉持薄利多銷的概念回饋服務大家，拜託喊單勿刪除留言、勿退換、勿棄單、記得取貨！
違規一律踢出群組列永久黑名單
（信用很值錢，勿以身試法）

1.本館用相簿或記事本上架商品，商品請「截圖私訊」我欲購買「數量」及「金額」。

2.本館內的商品一律全新，非全部現貨，相簿名稱會註明(預購/現貨)。
(預購等待天數約7-10天，從闆闆訂貨日開始算起，非您的訂購日期起算。)
一定盡力追貨，商品一到手刀出貨！

3.有購買商品的朋友
(1)現貨兩天結一次單(或選購完私訊我)
(2)預購商品等待全數到齊後結單。(提供蝦皮／PC／郵寄／店到店)

⚠新客人僅提供「 郵寄／店到店／PC蝦皮先匯款純取貨」需先匯款⚠
由熟客加入的新朋友可算熟客喔 !

4.結帳方式：兩日會跟有訂購商品的美女結單，開蝦皮或PC賣場下單。
(郵寄需先匯款者一樣要下單，下單後48hr沒有匯款一律當作棄單，直接踢出群組，我也不會找你詢問原因，商品不保留匯款後請記得保存匯款證明私訊我後，安排出貨。) 

5.收到包裹開封前請檢查包裹外觀，開封前最佳方式請錄影以便商品若有短少或損壞時可最為佐證，出貨包裝時【雪莉衣飾小舖】皆有錄影存證。

👉運送方式👈
🌟新客(第一次購買)適用
【郵寄/店到店】提供郵局帳號，請於下單後先匯款後寄出。
✔郵寄1號袋運費40元
✔郵寄2號袋運費50元
✔超商店到店60元(7-11／全家)
🌟熟客(已購買過)適用
【蝦皮】匯款/貨到付款(依照個人蝦皮下單帳號狀況計算運費／每單酌收5元手續費)
【PChome】下單後開個人賣場提供下單(貨到付款)。
本賣場暫無實體店面無面交服務噢～
👉常態活動👈
✔結單滿２０００元⚠郵寄／店到店免運費⚠
✔邀請五人加入，第一次購買折２０元
✔不定期出清、抽獎活動、現貨出清大滿貫

⛔嚴禁跑單、棄單(各大社團公開黑名，絕對提告！)
⛔不可退貨換(出貨都會檢查，如因運送中產生的損壞，請提供全程拆開包裹「影片」，才能退款。)

新加入的朋友，
看過購物規則請在底下留言回覆　「ＯＫ」　
再開始購買喔！"
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
                            'to' => $group,
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
                            'replyToken' => $event['replyToken'],
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
