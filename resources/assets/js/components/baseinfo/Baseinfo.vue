<template>
    <div class="baseinfo">
      <h3>基础信息</h3>
      <div class="answer-wrap">
        <div class="answer">
            <div class="input-box">
              <label>姓名</label>
              <div class="input-text">
                <input type="text" name="name" value="" required="true" placeholder="请输入孩子姓名">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>性别</label>
              <div class="input-text">
                <label class="check-box">
                  <input type="radio" name="sex" :value="'0'" required="true"><span></span> 男
                </label>
                <label class="check-box">
                  <input type="radio" name="sex" :value="'1'" required="true"><span></span> 女
                </label>
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>出生日期</label>
              <div class="input-text">
                <input type="date" name="birthday" value="" required="true">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>监护人姓名</label>
              <div class="input-text">
                <input type="text" name="guardian_name" value="" required="true" placeholder="监护人姓名">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>孩子年龄</label>
              <div class="input-text">
                <input type="text" name="age" value="" required="true" placeholder="孩子年龄">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>关系</label>
              <div class="input-text">
                <input type="text" name="relation" value="" required="true" placeholder="与孩子的关系">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>职业</label>
              <div class="input-text">
                <input type="text" name="profession" value="" required="true" placeholder="请输入您的职业">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>联系地址</label>
              <div class="input-text">
                <input type="text" name="address" value="" required="true" placeholder="详细的联系地址">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>联系电话</label>
              <div class="input-text">
                <input type="text" name="mobile" value="" required="true" placeholder="请输入联系电话">
              </div>
            </div>
        </div>
      </div>

      <h3>一、母孕期情况</h3>
      <div class="answer-wrap">
        <h4>1.孕期</h4>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" :value="'0'" required="true"><span></span> 早产
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" :value="'1'" required="true"><span></span> 足月
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" :value="'2'" required="true"><span></span> 自然产
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" :value="'3'" required="true"><span></span> 刨腹产
            </label>
        </div>
      </div>
      <div class="answer-wrap">
        <h4>2.母亲怀孕期间活动量</h4>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy_activity" :value="'0'" required="true"><span></span> 足
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy_activity" :value="'1'" required="true"><span></span> 不足
            </label>
        </div>
      </div>
      <div class="answer-wrap">
        <h4>3.父母生产时的年龄</h4>
        <div class="answer">
            <div class="input-box">
              <label>父亲</label>
              <div class="input-text">
                <input type="text" name="father_age" value="" required="true" placeholder="请输入年龄（数字）">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>母亲</label>
              <div class="input-text">
                <input type="text" name="mother_age" value="" required="true" placeholder="请输入年龄（数字）">
              </div>
            </div>
        </div>
      </div>

      <h3>二、生长养育史</h3>
      <div class="answer-wrap">
        <h4>1.喂养情况</h4>
        <h5>岁独立前喂养情况</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed" :value="'0'" required="true"><span></span> 母乳
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed" :value="'1'" required="true"><span></span> 人工
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed" :value="'2'" required="true"><span></span> 混合
            </label>
        </div>
        <h5>岁独立后喂养情况</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed_old" :value="'0'" required="true"><span></span> 岁独立用小勺进餐
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed_old" :value="'1'" required="true"><span></span> 右手
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed_old" :value="'2'" required="true"><span></span> 左手
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed_old" :value="'3'" required="true"><span></span> 不分
            </label>
        </div>
      </div>

      <div class="answer-wrap">
        <h4>2.运动发展情况</h4>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports" :value="'0'" required="true"><span></span> 婴儿期手脚自由活动
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports" :value="'1'" required="true"><span></span> 包裹“蜡烛包”
            </label>
        </div>
        <div class="answer">
          <div class="input-box">
            <label>爬行时间</label>
            <div class="input-text">
              <input type="text" name="sports_time" value="" required="true" placeholder="几个月会爬（输入数字）">
            </div>
          </div>
        </div>
        <h5>是否用学步车</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports_car" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports_car" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
      </div>

      <div class="answer-wrap">
        <h4>3.安全感发展</h4>
        <div class="answer">
          <div class="input-box input-box-max">
            <label>两岁之前晚上和谁睡</label>
            <div class="input-text">
              <input type="text" name="safe_person" value="" required="true" placeholder="父亲、母亲、爷爷、奶奶">
            </div>
          </div>
        </div>
        <h5>三岁之前和母亲是否有分离</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_mother" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_mother" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
        <h5>睡觉时需要依恋物</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_things" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_things" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
        <h5>习惯咬手指啃东西</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_bite" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_bite" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
      </div>

      <h3>三、生活环境</h3>
      <div class="answer-wrap">
        <h4>1.养育方法</h4>
        <h5>父亲：</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" :value="'0'" required="true"><span></span> 宽
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" :value="'1'" required="true"><span></span> 严
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" :value="'2'" required="true"><span></span> 放任
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" :value="'3'" required="true"><span></span> 普通
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" :value="'4'" required="true"><span></span> 不定
            </label>
        </div>
        <h5>母亲：</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" :value="'0'" required="true"><span></span> 宽
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" :value="'1'" required="true"><span></span> 严
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" :value="'2'" required="true"><span></span> 放任
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" :value="'3'" required="true"><span></span> 普通
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" :value="'4'" required="true"><span></span> 不定
            </label>
        </div>
        <h5>养育者与孩子沟通时间</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_time" :value="'0'" required="true"><span></span> 长
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_time" :value="'1'" required="true"><span></span> 短
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_time" :value="'2'" required="true"><span></span> 没有
            </label>
        </div>
        <h5>密切程度</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" :value="'0'" required="true"><span></span> 很密切
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" :value="'1'" required="true"><span></span> 密切
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" :value="'2'" required="true"><span></span> 一般
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" :value="'3'" required="true"><span></span> 不密切
            </label>
        </div>
        <h5>沟通方式</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_method" :value="'0'" required="true"><span></span> 鼓励肯定多
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_method" :value="'1'" required="true"><span></span> 批评否定多
            </label>
        </div>
        <h5>沟通方式</h5>
        <div class="answer">
          <div class="input-box input-box-max">
            <label>父母关系如何</label>
            <div class="input-text">
              <input type="text" name="bring_relation" value="" required="true" placeholder="很好、好、还不错、不好">
            </div>
          </div>
        </div>
      </div>

      <h3>四、语言现状</h3>
      <div class="answer-wrap">
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'0'" required="true"><span></span> 口吃
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'1'" required="true"><span></span> 发音不清
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'2'" required="true"><span></span> 自言自语
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'3'" required="true"><span></span> 固定音调
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'4'" required="true"><span></span> 鹦鹉学舌
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'5'" required="true"><span></span> 发音困难
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'6'" required="true"><span></span> 说话声小
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'7'" required="true"><span></span> 不爱讲话
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="lange" :value="'8'" required="true"><span></span> 其他
            </label>
        </div>
      </div>

      <h3>五、行为表现</h3>
      <div class="answer-wrap">
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="behavior" :value="'0'" required="true"><span></span> 小动作多（吸手指、摸生殖器等）
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="behavior" :value="'1'" required="true"><span></span> 注意力不集中，东张西望
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="behavior" :value="'2'" required="true"><span></span> 攻击他人
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="behavior" :value="'3'" required="true"><span></span> 自伤行为
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="behavior" :value="'4'" required="true"><span></span> 多动
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="behavior" :value="'5'" required="true"><span></span> 刻板行为
            </label>
        </div>
      </div>

      <h3>六、情绪反应</h3>
      <div class="answer-wrap">
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="emotion" :value="'0'" required="true"><span></span> 爱生气
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="emotion" :value="'1'" required="true"><span></span> 常哭、闹、笑
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="emotion" :value="'2'" required="true"><span></span> 极端恐惧（怕声音、怕黑）
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="emotion" :value="'3'" required="true"><span></span> 摔东西、扔东西
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="emotion" :value="'4'" required="true"><span></span> 不满足时常发脾气
            </label>
        </div>
      </div>

      <h3>七、请家长详细描述儿童目前的问题和困难以及家长的困扰。</h3>
      <div class="answer-wrap">
        <div class="answer">
          <div class="textarea-box">
            <textarea name="puzzled" rows="5"></textarea>
          </div>
        </div>
      </div>
      <h3>八、请家长案动作要求发送孩子视频</h3>
      <div class="answer-wrap">
        <h4>1.走平衡木</h4>
        <div class="answer">
          <h5>a.无法侧站着3秒以上，或者牵着孩子的手而孩子无法顺利完成动作</h5>
        </div>
        <div class="answer">
          <h5>b.孩子想快冲而跌下</h5>
        </div>

        <h4>2.逆时针方向转10圈（视情形而定是由家长或同仁抱着进行）- 了解眼球震颤情况</h4>
        <h4>3.爬斜坡，在爬坡的过程请看孩子表现情况，是否需要有人扶，是否敢自己走</h4>
        <h4>4.请家长准备糖果罐，罐中装一些糖果，请孩子自己开启瓶盖拿糖果</h4>
        <h4>5.贴彩色胶带或粘贴于孩子的脸上、手臂与腿上，看其反应</h4>
        <h4>6.球池群物体</h4>
        <div class="answer">
          <h5>将一个小物件的玩具放入众多玩具当中，或者球池当中，看孩子寻找物体的反应</h5>
        </div>

      </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                report: {}
            }
        },
        created() {
        },
        methods: {
        }
    }
</script>

<style scoped lang="less">
.baseinfo {

}
.answer-wrap {
  margin-bottom: 1rem;
  h4,h5 {
    font-size: 16px;
    padding: .5rem 0 0 0;
    color: #555;
  }
  h5 {
    font-size: 14px;
    font-weight: 400;
  }
}

.input-box {
  position: relative;
  display: flex;
  padding: .7rem 0;
  label {
    flex: 0 0 100px;
    width: 100px;
    color: #555;
    font-size: 14px;
  }
  .input-text {
    flex: 1;
    input {
      width: 100%;
      padding: 0;
      border: 0;
      outline: none;
      font-size: 14px;
    }
    .check-box {
      display: inline;
      padding-top: 0;
      padding-bottom: 0;
      margin-right: 2rem;
    }
  }
}
.input-box-max {
  label {
    flex: 0 0 150px;
    width: 150px;
  }
}
.textarea-box {
  padding-right: 1rem;
  textarea {
    width: 100%;
    padding: 1rem 0;
    outline: none;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    font-size: 16px;
  }
}
</style>
