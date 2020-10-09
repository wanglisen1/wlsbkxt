<html>
<head>
    <title>视频列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0,minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
</head>
<style>
    *{  margin: 0;padding: 0;}
    .mili_bg{  width: 100%;  height:auto;  background: url("/qkpt/millionywbg.jpg") no-repeat;  background-size: 100% auto;  background-color: #fff3e3;
                min-height: 1165px;  overflow: hidden; font-size: 0.22rem }
    .mili_conten{  width: 88%;  margin: 0 auto;    }
    .mili_molder{  margin-bottom: 65px;  }
    .mili_video{  width: 100%;  height: 205px; border: 1px solid #aa6946;  border-radius: 10px;}
    .video_molder{
        position: relative
    }
    .mili_title{  width: 125px;  height: 32px;  background-color: #aa6946;  color: #fff;  line-height: 32px;  font-size: 0.28rem;  text-align: center;
        border-radius: 10px;  margin-top: 15px;  margin-bottom: 15px;  }
    .mili_introduce{  width: 100%;   line-height: 28px;  text-align: justify;  }
    .mili_code{  text-align: center; margin-bottom: 30px }
    /*数学*/
    .milisx_bg{  width: 100%;  height:auto;  background: url("/qkpt/milibgsx.jpg") no-repeat;  background-size: 100% auto;
        background-color: #ed533a;  min-height: 1165px;
        overflow: hidden;font-size: 0.18rem;
    }
    .mili_titlesx{
        width: 125px;  height: 32px;  background-color: #f68b41;  color: #fff;  line-height: 32px;  font-size: 0.28rem;  text-align: center;
        border-radius: 10px;  margin-top: 15px;  margin-bottom: 15px;
    }
    .mili_introducesx{  width: 100%;  font-size: 0.22rem;  line-height: 28px;  text-align: justify; color: #fff }
    .video_mask{
        width: 100%;
        height: 100%;
        background: rgba(0,0,0,.5);
        position: absolute;
        text-align: center;font-size: 50px;
        color: #fff;
        line-height: 0px;
    }
    .miliyy_bg{  width: 100%;  height:auto;  background-color: #30a9bc; font-size: 0.22rem }
    .miliyy_conten{  width: 6.98rem;  margin: 0 auto;  background-color: #fff; border-radius: 20px; padding-top: 0.4rem;padding-bottom: 0.4rem;}
    .miliyy_molder{  margin-bottom: 0.65rem;  }
    .miliyy_video{  width: 100%;  height: 190px; border: 1px solid #30a9bc;  border-radius: 10px;}
    .video_molder{
        position: relative
    }
    .miliyy_title{  width: 125px;  height: 32px;  background-color: #30a9bc;  color: #fff;  line-height: 32px;  font-size: 0.28rem;  text-align: center;
        border-radius: 10px;  margin-top:0.15rem;  margin-bottom: 0.15rem; margin-left: 0.15rem; }
    .miliyy_introduce{  width: 95%;   line-height: 28px;  text-align: justify;font-size: 0.28rem; margin-left: 0.15rem; }
    .miliyy_code{  text-align: center; margin-bottom: 30px }
    .miliyy_introduce p{
        text-indent: 2em;

</style>
<body>
<input type="hidden" class="sub" value="{{$sub}}">
{{--//语文--}}
@if($sub==1)
<div class="mili_bg">
    <div style="padding-top: 4rem;;width: 88%; margin: 0 auto; margin-bottom: 20px;">
        <p style="font-size: 20px; font-weight: 600;">使用说明</p>
        <p style="line-height: 25px;margin-left: 2em">1.本次课程分为线上4节课，线下校区2节免费课。</p>
        <p style="line-height: 25px;margin-left: 2em">2.线上每节课后巩固练习题请联系当地校区领取。</p>
        <p style="line-height: 25px;margin-left: 2em">3.线下2节免费课程由翰师问鼎教育总部名师亲自到当地校区授课，因听课学生较多请您提前联系校区负责人员进行预约听课。</p>
    </div>
    <div class="mili_conten">
       {{--第一节--}}
       <div class="mili_molder">
           <div>
               <video class="mili_video"
                      src="http://www.hswdjy.com/qkpt/video/ywqk1.mp4"
                      preload="none"
                      controlsList="nodownload"
                      controls poster="/qkpt/yw1.jpg">
               </video>
           </div>
           <div class="mili_tap">
               <div class="mili_titlesx">
                   教学目标
               </div>
               <div class="mili_introduce">
                   <p>1.了解唐朝由盛转衰的关键——安史之乱；</p>
                   <p>2.通过人物生平，了解白居易的一生；</p>
                   <p>3.通过了解历史背景，相应的人物生平，分析出古诗的中心主旨。</p>
               </div>
               <div class="mili_titlesx">
                   主要内容
               </div>
               <div class="mili_introduce">
                   <p>1.安史之乱爆发及影响；</p>
                   <p>2.白居易前半生生平；</p>
                   <p>3.《观刈麦》背后的历史现状，古诗通用知识。</p>
                   <p>4.《长恨歌》名句品析及背后的故事。</p>
               </div>

           </div>
       </div>
        {{--第二节--}}
        <div class="mili_molder">
            <div>
                <video class="mili_video"
                       src="http://www.hswdjy.com/qkpt/video/ywqk2.mp4"
                       preload="none"
                       controlsList="nodownload"
                       controls poster="/qkpt/yw2.jpg">
                </video>
            </div>
            <div class="mili_tap">
                <div class="mili_titlesx">
                    教学目标
                </div>
                <div class="mili_introduce">

                    <p>1.认识科幻文学，学习科幻作文写作方法；</p>
                    <p>2.了解时代背景，及凡尔纳生平；</p>
                    <p>3.赏析文本《海底两万里》。</p>
                </div>
                <div class="mili_titlesx">
                    主要内容
                </div>
                <div class="mili_introduce">
                    <p>1.讲解科幻体文学；</p>
                    <p>2.社会背景：工业革命，了解工业革命时期的机器她点；</p>
                    <p>3.凡尔纳生平；</p>
                    <p>4.凡尔纳神奇的预言5.《海底两万里》整体介绍及片段赏析，学习说明文阅读方法及写作技巧。</p>
                </div>

            </div>
        </div>
        {{--第三节--}}
        <div class="mili_molder">
            <div >
                <video class="mili_video"
                       src="http://www.hswdjy.com/qkpt/video/ywqk3.mp4"
                       preload="none"
                       controlsList="nodownload"
                       controls poster="/qkpt/yw3.jpg">
                </video>
            </div>
            <div class="mili_tap">
                <div class="mili_titlesx">
                    教学目标
                </div>
                <div class="mili_introduce">
                    <p>1.拓宽写作思路，积累写作素材；</p>
                    <p>2.激发学生想象力，培养描述人物的能力；</p>
                    <p>3.了解名家名篇，在名家名篇中积累写作技法。</p>
                </div>
                <div class="mili_titlesx">
                    主要内容
                </div>
                <div class="mili_introduce">
                    <p>1.以寻找“天才”为切入点；</p>
                    <p>2.讲解名人故事；</p>
                    <p>3.三步写作技法讲解；</p>
                    <p>4.文本赏析。</p>
                </div>

            </div>
        </div>
        {{--第四节--}}
        <div class="mili_molder">
            <div>
                <video class="mili_video"
                       src="http://www.hswdjy.com/qkpt/video/ywqk4.mp4"
                       preload="none"
                       controlsList="nodownload"
                       controls poster="/qkpt/yw4.jpg">
                </video>
            </div>
            <div class="mili_tap">
                <div class="mili_titlesx">
                    教学目标
                </div>
                <div class="mili_introduce">
                    <p>1.了解三十六计，让孩子在古代故事中产生对语文阅读的阅读兴趣；</p>
                    <p>2.了解古代历史，为日后学习打下基础； </p>
                    <p>3.融会贯通，品析古诗文。</p>
                </div>
                <div class="mili_titlesx">
                    主要内容
                </div>
                <div class="mili_introduce">
                    <p>1.了解历史君子之战及后来有谋略战术的原因；</p>
                    <p>2.三十六计：（ 战胜计部分）</p>
                    <p>3.古诗、文言知识积累。</p>
                </div>

            </div>
        </div>
        {{--第五节--}}
        <div class="mili_molder">
            <div class="video_molder">
                <div class="video_mask">
                    <p style="margin-top: 20%; margin-bottom: 15%;">本节课请联系当地校区</p>
                    <p >免费上课</p>

                </div>
                <video class="mili_video"
                       src="http://www.hswdjy.com/qkpt/video/ywqk5.mp4"
                       preload="none"
                       controlsList="nodownload"
                        poster="/qkpt/yw5.jpg">
                </video>
            </div>
            <div class="mili_tap">
                <div class="mili_titlesx">
                    教学目标
                </div>
                <div class="mili_introduce">
                    <p>1.了解什么是动静结合，在古诗中体会动静结合的方法；学习动静结合的几种描写方法；</p>
                    <p>2.培养学生语言表达能力；</p>
                    <p>3.完成一篇含有动静结合写作技法的习作。</p>
                </div>
                <div class="mili_titlesx">
                    主要内容
                </div>
                <div class="mili_introduce">
                    <p>1.在古诗《鸟鸣涧》等中体会动静结合的妙处；</p>
                    <p>2.动静结合写人、写景、写场面技法讲解；</p>
                    <p>3.经典范文赏析，完成习作。</p>
                </div>

            </div>
        </div>
        {{--第六节--}}
        <div class="mili_molder">
            <div class="video_molder">
                <div class="video_mask">
                    <p style="margin-top: 20%; margin-bottom: 15%;">本节课请联系当地校区</p>
                    <p >免费上课</p>

                </div>
                <video class="mili_video"
                       src="http://www.hswdjy.com/qkpt/video/ywqk6.mp4"
                       preload="none"
                       controlsList="nodownload"
                        poster="/qkpt/yw6.jpg">
                </video>
            </div>
            <div class="mili_tap">
                <div class="mili_titlesx">
                    教学目标
                </div>
                <div class="mili_introduce">
                    <p>1.了解“民族魂”的真正含义；</p>
                    <p>2.了解鲁迅生平及其文学史地位；</p>
                    <p>3.品读代表作，培养赏析名著的能力。</p>
                </div>
                <div class="mili_titlesx">
                    主要内容
                </div>
                <div class="mili_introduce">
                    <p>1讲解社会背景，讲解鲁迅少被人知道的故事；</p>
                    <p>2.讲解鲁迅弃医从文；</p>
                    <p>3.作品赏析《闰土》，学习人物描写；</p>
                    <p>4.赏析《朝花夕拾》学习白描的写作手法。</p>
                </div>

            </div>
        </div>
    </div>
    <div class="mili_code">
        <img src="/qkpt/hswdcode.jpg" alt="" style="margin-bottom: 30px">
        <p style="font-size: 18px">北京翰师问鼎教育教育科技有限公司</p>
    </div>
</div>
    {{--数学--}}
@elseif($sub==2)
    <div class="milisx_bg">
        <div style="padding-top: 195px;;width: 88%; margin: 0 auto; margin-bottom: 20px;color: #fff">
            <p style="font-size: 20px; font-weight: 600;color: #fff">使用说明</p>
            <p style="line-height: 25px;margin-left: 2em;color: #fff">1.本次课程分为线上4节课，线下校区2节免费课。</p>
            <p style="line-height: 25px;margin-left: 2em;color: #fff">2.线上每节课后巩固练习题请联系当地校区领取。</p>
            <p style="line-height: 25px;margin-left: 2em;color: #fff">3.线下2节免费课程由翰师问鼎教育总部名师亲自到当地校区授课，因听课学生较多请您提前联系校区负责人员进行预约听课。</p>
        </div>
        <div class="mili_conten">
             {{--第一节--}}
            <div class="mili_molder">
                <div>
                    <video class="mili_video"
                           src="http://www.hswdjy.com/qkpt/video/sxqk1.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls poster="/qkpt/sx1.jpg"
                    >
                    </video>
                </div>
                <div class="mili_tap">
                    <div class="mili_titlesx">
                        教学目标
                    </div>
                    <div class="mili_introducesx">
                        <p>1.掌握加法找好朋友数、减法找同尾数、添（去）括号法则、观察分组的方法与技巧；</p>
                        <p>2.培养学生的观察能力，归纳总结能力。</p>
                    </div>
                    <div class="mili_titlesx">
                        教学内容
                    </div>
                    <div class="mili_introducesx">
                        本讲通过闯关找线索学习速算与巧算的方法：加法找好朋友数、减法找同尾数、添（去）括号法则、观察分组，通过这些方法使计算速度更快更准确
                    </div>

                </div>
            </div>
            {{--第二节--}}
            <div class="mili_molder">
                <div>
                    <video class="mili_video"
                           src="http://www.hswdjy.com/qkpt/video/sxqk2.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls poster="/qkpt/sx2.jpg"
                    >
                    </video>
                </div>
                <div class="mili_tap">
                    <div class="mili_titlesx">
                        教学目标
                    </div>
                    <div class="mili_introducesx">
                        <p>1.掌握速算与巧算的方法：加补凑整法、基准数法；</p>
                        <p>2.培养学生的观察能力，归纳总结能力。</p>
                    </div>
                    <div class="mili_titlesx">
                        教学内容
                    </div>
                    <div class="mili_introducesx">
                        本节课通过孙悟空三打白骨精的故事进行闯关，在整个故事及闯关中学习速算与巧算的方法：加补凑整法、基准数法，通过这些方法的学习提升计算能力，及观察归纳能力。
                    </div>

                </div>
            </div>
            {{--第三节--}}
            <div class="mili_molder">
                <div>
                    <video class="mili_video"
                           src="http://www.hswdjy.com/qkpt/video/sxqk3.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls poster="/qkpt/sx3.jpg"
                    >
                    </video>
                </div>
                <div class="mili_tap">
                    <div class="mili_titlesx">
                        教学目标
                    </div>
                    <div class="mili_introducesx">
                        <p>1.掌握画线段图法，并会画线段图分析和差关系</p>
                        <p>2.能归纳总结和差的公式</p>
                        <p>3.掌握假设的思想，并会运用解答问题</p>
                    </div>
                    <div class="mili_titlesx">
                        教学内容
                    </div>
                    <div class="mili_introducesx">
                        本节课主要通过身边熟悉的场景，引导学生发现和差问题，并通过画线段图分析数量的之间的关系，归纳总结和差问题公式，通过各种变形，让学生理解假设思想的应用对于解题的帮助，以后遇到此类问题能够独自分析解答。
                    </div>

                </div>
            </div>
            {{--第四节--}}
            <div class="mili_molder">
                <div>
                    <video class="mili_video"
                           src="http://www.hswdjy.com/qkpt/video/sxqk4.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls poster="/qkpt/sx4.jpg"
                    >
                    </video>
                </div>
                <div class="mili_tap">
                    <div class="mili_titlesx">
                        教学目标
                    </div>

                    <div class="mili_introducesx">
                        <p> 1.掌握线段图法，会画线段图分析差倍的关系</p>
                        <p> 2.能归纳总结差倍的公式</p>
                        <p> 3.培养学生分析问题，解决问题的能力。</p>
                    </div>
                    <div class="mili_titlesx">
                        教学内容
                    </div>
                    <div class="mili_introducesx">
                        本节课主要将差倍问题融入到熟悉的故事中，通过画线段图分析差倍之间的关系，归纳总结差倍问题的公式，再此过程中，让学生学会观察、分析数量间的关系，掌握解题的能力。
                    </div>

                </div>
            </div>
            {{--第五节--}}
            <div class="mili_molder">
                <div class="video_molder">
                    <div class="video_mask">
                        <p style="margin-top: 20%; margin-bottom: 15%;">本节课请联系当地校区</p>
                        <p >免费上课</p>

                    </div>
                    <video class="mili_video"
                           src="http://www.hswdjy.com/qkpt/video/sxqk5.mp4"
                           preload="none"
                           controlsList="nodownload"
                            poster="/qkpt/sx8.jpg"
                    >
                    </video>
                </div>
                <div class="mili_tap">
                    <div class="mili_titlesx">
                        教学目标
                    </div>
                    <div class="mili_introducesx">
                        <p>1.了解等差数列的相关概念</p>
                        <p>2.能归纳总结等差数列的通项公式、项数公式、求和公式</p>
                        <p>3.能利用等差数列的中通项公式、项数公式、求和公式解答问题</p>
                        <p>4.培养学生观察思考，归纳总结的能力。</p>
                    </div>
                    <div class="mili_titlesx">
                        教学内容
                    </div>
                    <div class="mili_introducesx">
                        本讲通过高斯的故事引起学生的兴趣，再通过数学的场景故事，让学生了解等差数列中相关概念，并能归纳总结出其中的关系，最后能进行举一反三，应用公式解决相关问题。
                    </div>

                </div>
            </div>
            {{--第六节--}}
            <div class="mili_molder">
                <div class="video_molder">
                    <div class="video_mask">
                        <p style="margin-top: 20%; margin-bottom: 15%;">本节课请联系当地校区</p>
                        <p >免费上课</p>

                    </div>
                    <video class="mili_video"
                           src="http://www.hswdjy.com/qkpt/video/sxqk6.mp4"
                           preload="none"
                           controlsList="nodownload"
                           poster="/qkpt/sx7.jpg"
                    >
                    </video>
                </div>
                <div class="mili_tap">
                    <div class="mili_titlesx">
                        教学目标
                    </div>

                    <div class="mili_introducesx">
                        <p>1.了解“盈”“亏”的概念</p>
                        <p>2.掌握盈亏的三种类型，并能总结盈亏的三种类型的公式</p>
                        <p>3.能运用公式解决盈亏问题</p>
                        <p>4.培养学生的抽象思维、归纳总结能力。</p>
                    </div>
                    <div class="mili_titlesx">
                        教学内容
                    </div>
                    <div class="mili_introducesx">
                        本节课通过熟悉的场景引出盈亏问题，再通过不同的场景，分析不同盈亏类型的方法。此类问题比较抽象，通过熟悉的故事、实际操作，让学生彻底掌握解题思想，并能自己运用解决问题。
                    </div>

                </div>
            </div>

        </div>
        <div class="mili_code">
            <img src="/qkpt/hswdcode.jpg" alt="" style="margin-bottom: 30px">
            <p style="font-size: 20px;color: #fff">北京翰师问鼎教育教育科技有限公司</p>
        </div>
    </div>
@elseif($sub==3)
    <div class="miliyy_bg">
        <img src="/qkpt/bcqk_01.jpg" alt="" width="100%">
        <div class="miliyy_conten" >
            <img src="/qkpt/bcqk_04.jpg" alt="" style="width: 5.76rem;height: 0.71rem;margin-left:0.6rem;margin-bottom: 0.4rem;">

            <div class="miliyy_molder">
                <div style="font-size: 0.3rem;font-weight: 600;text-align: center;margin-bottom: 0.18rem;"> 趣味大语文互动课</div>
                <div style="width: 6.7rem; margin: 0 auto;">
                    <video class="miliyy_video"
                           src="http://www.hswdjy.com/qkpt/video/yyzcyw.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls>
                    </video>
                </div>
                <div class="miliyy_tap">
                    <div class="miliyy_title">
                        小马老师
                    </div>
                    <div class="miliyy_introduce">
                        <p>翰师问鼎趣味大语文首席讲师；</p>
                        <p>毕业于重点师范大学；</p>
                        <p> 连续多届获得教师赛课一等奖，作文大赛特等奖；</p>
                        <p>带领数十家业绩排名末尾的校区成功逆袭，位居榜首；</p>
                        <p> 助力上千学子考入211、985院校。</p>
                    </div>
                    <div class="miliyy_title">
                        授课特点
                    </div>
                    <div class="miliyy_introduce">
                        <p>都说当好一名老师是大门里边种南瓜——难上加难，小马老师却能让你满怀期待地来上课，
                            回味无穷地回家去。没有什么英雄主义，只想做孩子们的知心大姐姐和通往成功路上的引路
                            人。</p>
                    </div>

                </div>
            </div>
            <div class="miliyy_molder">
                <div style="font-size: 0.3rem;font-weight: 600;text-align: center;margin-bottom: 0.18rem;"> 思维培优数学互动课</div>
                <div style="width: 6.7rem; margin: 0 auto;">
                    <video class="miliyy_video"
                           src="http://www.hswdjy.com/qkpt/video/yyzcsx.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls >
                    </video>
                </div>
                <div class="miliyy_tap">
                    <div class="miliyy_title">
                        大王老师
                    </div>
                    <div class="miliyy_introduce">
                        <p>翰师问鼎教育数学教研主管、金牌讲师；</p>
                        <p>培优数学故事教学法创始人；</p>
                        <p>15年一线教学经验，学员达10万+；</p>
                        <p>某上市机构学科带头人，尖子生培养项目研究负责人；</p>
                        <p>某在线教育公司数学研发项目负责人，在线课程质量监管人。</p>

                    </div>
                    <div class="miliyy_title">
                        授课特点
                    </div>
                    <div class="miliyy_introduce">
                        <p>能把孩子喜欢的故事加入数学的课堂，让数学的学习既有趣又充实；
                            能给孩子一双发现的眼睛，让孩子从生活中找到数学，探索数学；
                            这就是大王老师，愿做一个孩子王，让孩子真正的爱上数学。</p>

                    </div>

                </div>
            </div>

            <div class="miliyy_molder">
                <div style="font-size: 0.3rem;font-weight: 600;text-align: center;margin-bottom: 0.18rem;">戏剧英语互动课</div>
                <div style="width: 6.7rem; margin: 0 auto;">
                    <video class="miliyy_video"
                           src="http://www.hswdjy.com/qkpt/video/yyzcying.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls >
                    </video>
                </div>
                <div class="miliyy_tap">
                    <div class="miliyy_title">
                        Helen老师
                    </div>
                    <div class="miliyy_introduce">
                        <p>翰师问鼎戏剧英语首席讲师</p>
                        <p>毕业于重点大学英语专业，持有剑桥大学TKT，Celta证书</p>
                        <p>曾赴英国伦敦InternationalHouse深造学习</p>
                        <p>某上市机构师训负责人，考试课程教研负责人</p>
                    </div>
                    <div class="miliyy_title">
                        授课特点
                    </div>
                    <div class="miliyy_introduce">
                        <p>Helen老师想当你英语学习道路上那个可爱的哆啦A梦，给你变化出五彩斑斓的上课道具，
                            课堂游戏，闯关任务，记忆小妙招哦。让我们在有趣的活动中培养对英语的热爱，在高效的
                            操练中掌握英语听说读写的能力。</p>

                    </div>

                </div>
            </div>



            <div class="miliyy_molder">
                <div style="font-size: 0.3rem;font-weight: 600;text-align: center;margin-bottom: 0.18rem;">百万校区私享会</div>
                <div style="width: 6.7rem; margin: 0 auto;">
                    <video class="miliyy_video"
                           src="http://www.hswdjy.com/qkpt/video/yyzcyy.mp4"
                           preload="none"
                           controlsList="nodownload"
                           controls >
                    </video>
                </div>
                <div class="miliyy_tap">
                    <div class="miliyy_title">
                        杨老师
                    </div>
                    <div class="miliyy_introduce">
                        <p>翰师问鼎满营校区运营官</p>
                        <p>原知名上市教育集团北京大区市场总监 </p>
                        <p> 指导单校单月招生破千人</p>
                        <p> 一线实战运营经验10年</p>
                    </div>
                    <div class="miliyy_title">
                        亮点
                    </div>
                    <div class="miliyy_introduce" >
                        <p>运营助力保障，百天百万校区</p>
                        <p>两大招生利器，共建百万校区</p>
                    </div>

                </div>
            </div>
            <div class="miliyy_code">
                <img src="/qkpt/hswdcode.jpg" alt="" style="margin-bottom: 30px">
                <p style="font-size: 18px">北京翰师问鼎教育教育科技有限公司</p>
            </div>

        </div>

    </div>
@endif
</body>
<html>
<script src="/jquery-3.1.1.min.js"></script>
<script>
     (function (doc, win) {
                var docEl = doc.documentElement,
                            resizeEvt = 'orientationchange' in window ? 'orientationchange' : 'resize',
                             recalc = function () {
                            var clientWidth = docEl.clientWidth;
                                 console.log(clientWidth)
                             if (!clientWidth) return;
                            // if(clientWidth>=750){
                                 //   docEl.style.fontSize = '100px';
                               //  }else{
                                     docEl.style.fontSize = 100 * (clientWidth / 750) + 'px';
                              //   }
                         };

                 if (!doc.addEventListener) return;
                 win.addEventListener(resizeEvt, recalc, false);
                doc.addEventListener('DOMContentLoaded', recalc, false);
     })(document, window);
    $(function(){
        function setTimer(t){
            var timer = window.setInterval(function() {
                $.ajax({
                    type: 'post',
                    url: "/yzmilllog",
                    success: function (msg) {
                        if (msg.code != 2) {
                            alert('此号码已在别处登陆，请从新登陆');
                            clearInterval(timer);
                            location.href= '/bwlogin';
                        }
                    }
                });
                var sub = $('.sub').val();
                if(sub==3){
                    $.ajax({
                        type: 'post',
                        url: "/yzpass",
                        success: function (msg) {
                            if (msg.code != 2) {
                                alert('此号码已过期');
                                clearInterval(timer);
                                location.href= '/bwlogin';
                            }
                        }
                    });
                }

            },t * 1000);
            return timer;
        }
        setTimer(30)

        /**
         * 判断访问类型是PC端还是手机端
         */
        function isMobile() {
            var userAgentInfo = navigator.userAgent;

            var mobileAgents = [ "Android", "iPhone", "SymbianOS", "Windows Phone", "iPad","iPod"];

            var mobile_flag = false;

            //根据userAgent判断是否是手机
            for (var v = 0; v < mobileAgents.length; v++) {

                if (userAgentInfo.indexOf(mobileAgents[v]) > 0) {
                    mobile_flag = true;
                    break;
                }
            }
            var screen_width = window.screen.width;
            var screen_height = window.screen.height;
            //根据屏幕分辨率判断是否是手机
            if(screen_width < 600 && screen_height < 800){
                mobile_flag = true;
            }

            return mobile_flag;
        }
        var mobile = isMobile(); // true为手机，false为PC端
           console.log(mobile)
        if(mobile){
       $('.video_mask').css({
                "width": "100%",
            "height": "100%",
            " background": "rgba(0,0,0,.5)",
            "position": "absolute",
            " text-align": "center",
            "font-size": "30px",
            "color": "#fff",
            "line-height": "0px",
            })
            if(window.screen.width<376){
                $('.mili_video').css({
                   "width" : "100%","height" :"185px"," border": "1px solid #aa6946" ," border-radius": "10px"
                })
            }
        }else {

            $('.mili_bg').css({ "width" :"100%" ,  "height":"auto",  "background": "url('/qkpt/miliyw_bg.png') no-repeat","background-size": "100% auto",  "background-color": "#fff3e3", "min-height": "1165px", "overflow": "hidden"});
            $('.mili_molder').css({"display":"flex",  "justify-content": "space-between"})
            $('.mili_conten').css({ "width": "1200px", "min-width": "1200px", "margin": "0 auto",  "padding-top": "175px"})
           $('.mili_video').css( {"width": "660px",  "height": "365px"," border": "1px solid #aa6946", "border-radius": "10px"})
            $('.mili_tap').css({ "width": "455px"})
//            数学
            $('.milisx_bg').css({ "width" :"100%" ,  "height":"auto",  "background": "url('/qkpt/milisx_bg.jpg') no-repeat","background-size": "100% auto",  "background-color": "#ed533a", "min-height": "1165px", "overflow": "hidden"});

        }

    })
     var videos = document.getElementsByTagName('video');
     for (var i = videos.length - 1; i >= 0; i--) {
         (function(){
             var p = i;
             videos[p].addEventListener('play',function(){
                 pauseAll(p);
             })
         })()
     }
     function pauseAll(index){
         for (var j = videos.length - 1; j >= 0; j--) {
             if (j!=index) videos[j].pause();
         }
     };
</script>