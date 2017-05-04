<template>
    <div class="baseinfo">
      <h3>基础信息</h3>
      <div class="answer-wrap">
        <div class="answer">
            <div class="input-box">
              <label>姓名</label>
              <div class="input-text">
                <input type="text" name="name" v-model="data.name" required="true" placeholder="请输入孩子姓名">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>性别</label>
              <div class="input-text">
                <label class="check-box">
                  <input type="radio" name="sex" v-model="data.sex" :value="'0'" required="true"><span></span> 男
                </label>
                <label class="check-box">
                  <input type="radio" name="sex" v-model="data.sex" :value="'1'" required="true"><span></span> 女
                </label>
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>出生日期</label>
              <div class="input-text">
                <input type="date" name="birthday" v-model="data.birthday" value="" required="true">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>监护人姓名</label>
              <div class="input-text">
                <input type="text" name="guardian_name" v-model="data.guardian_name" value="" required="true" placeholder="监护人姓名">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>孩子年龄</label>
              <div class="input-text">
                <input type="text" name="age" v-model="data.age" required="true" placeholder="孩子年龄">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>关系</label>
              <div class="input-text">
                <input type="text" name="relation"  v-model="data.relation" required="true" placeholder="与孩子的关系">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>职业</label>
              <div class="input-text">
                <input type="text" name="profession" v-model="data.profession" required="true" placeholder="请输入您的职业">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>联系地址</label>
              <div class="input-text">
                <input type="text" name="address" v-model="data.address" required="true" placeholder="详细的联系地址">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>联系电话</label>
              <div class="input-text">
                <input type="tel" name="mobile" v-model="data.mobile" required="true" placeholder="请输入联系电话">
              </div>
            </div>
        </div>
      </div>

      <h3>一、母孕期情况</h3>
      <div class="answer-wrap">
        <h4>1.孕期</h4>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" v-model="data.pregnancy" :value="'0'" required="true"><span></span> 早产
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" v-model="data.pregnancy" :value="'1'" required="true"><span></span> 足月
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" v-model="data.pregnancy" :value="'2'" required="true"><span></span> 自然产
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy" v-model="data.pregnancy" :value="'3'" required="true"><span></span> 刨腹产
            </label>
        </div>
      </div>
      <div class="answer-wrap">
        <h4>2.母亲怀孕期间活动量</h4>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy_activity" v-model="data.pregnancy_activity" :value="'0'" required="true"><span></span> 足
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="pregnancy_activity" v-model="data.pregnancy_activity" :value="'1'" required="true"><span></span> 不足
            </label>
        </div>
      </div>
      <div class="answer-wrap">
        <h4>3.父母生产时的年龄</h4>
        <div class="answer">
            <div class="input-box">
              <label>父亲</label>
              <div class="input-text">
                <input type="text" name="father_age" v-model="data.father_age" required="true" placeholder="请输入年龄（数字）">
              </div>
            </div>
        </div>
        <div class="answer">
            <div class="input-box">
              <label>母亲</label>
              <div class="input-text">
                <input type="text" name="mother_age" v-model="data.mother_age" required="true" placeholder="请输入年龄（数字）">
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
              <input type="radio" name="feed" v-model="data.feed" :value="'0'" required="true"><span></span> 母乳
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed" v-model="data.feed" :value="'1'" required="true"><span></span> 人工
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed" v-model="data.feed" :value="'2'" required="true"><span></span> 混合
            </label>
        </div>
        <h5>岁独立后喂养情况</h5>
        <div class="answer">
            <div class="input-box input-box-max">
              <label>几岁独立用小勺进餐</label>
              <div class="input-text">
                <input type="text" name="feed_self" v-model="data.feed_self" required="true" placeholder="请输入年龄（数字）">
              </div>
            </div>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed_old" v-model="data.feed_old" :value="'1'" required="true"><span></span> 右手
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed_old" v-model="data.feed_old" :value="'2'" required="true"><span></span> 左手
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="feed_old" v-model="data.feed_old" :value="'3'" required="true"><span></span> 不分
            </label>
        </div>
      </div>

      <div class="answer-wrap">
        <h4>2.运动发展情况</h4>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports" v-model="data.sports" :value="'0'" required="true"><span></span> 婴儿期手脚自由活动
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports" v-model="data.sports" :value="'1'" required="true"><span></span> 包裹“蜡烛包”
            </label>
        </div>
        <div class="answer">
          <div class="input-box">
            <label>爬行时间</label>
            <div class="input-text">
              <input type="text" name="sports_time" v-model="data.sports_time" value="" required="true" placeholder="几个月会爬（输入数字）">
            </div>
          </div>
        </div>
        <h5>是否用学步车</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports_car" v-model="data.sports_car" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="sports_car" v-model="data.sports_car" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
      </div>

      <div class="answer-wrap">
        <h4>3.安全感发展</h4>
        <div class="answer">
          <div class="input-box input-box-max">
            <label>两岁之前晚上和谁睡</label>
            <div class="input-text">
              <input type="text" name="safe_person" v-model="data.safe_person" required="true" placeholder="父亲、母亲、爷爷、奶奶">
            </div>
          </div>
        </div>
        <h5>三岁之前和母亲是否有分离</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_mother" v-model="data.safe_mother" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_mother" v-model="data.safe_mother" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
        <h5>睡觉时需要依恋物</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_things" v-model="data.safe_things" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_things" v-model="data.safe_things" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
        <h5>习惯咬手指啃东西</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_bite" v-model="data.safe_bite" :value="'0'" required="true"><span></span> 是
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="safe_bite" v-model="data.safe_bite" :value="'1'" required="true"><span></span> 否
            </label>
        </div>
      </div>

      <h3>三、生活环境</h3>
      <div class="answer-wrap">
        <h4>1.养育方法</h4>
        <h5>父亲：</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" v-model="data.bring_father_method" :value="'0'" required="true"><span></span> 宽
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" v-model="data.bring_father_method" :value="'1'" required="true"><span></span> 严
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" v-model="data.bring_father_method" :value="'2'" required="true"><span></span> 放任
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" v-model="data.bring_father_method" :value="'3'" required="true"><span></span> 普通
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_father_method" v-model="data.bring_father_method" :value="'4'" required="true"><span></span> 不定
            </label>
        </div>
        <h5>母亲：</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" v-model="data.bring_mother_method" :value="'0'" required="true"><span></span> 宽
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" v-model="data.bring_mother_method" :value="'1'" required="true"><span></span> 严
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" v-model="data.bring_mother_method" :value="'2'" required="true"><span></span> 放任
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" v-model="data.bring_mother_method" :value="'3'" required="true"><span></span> 普通
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_mother_method" v-model="data.bring_mother_method" :value="'4'" required="true"><span></span> 不定
            </label>
        </div>
        <h5>养育者与孩子沟通时间</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_time" v-model="data.bring_communicate_time" :value="'0'" required="true"><span></span> 长
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_time" v-model="data.bring_communicate_time" :value="'1'" required="true"><span></span> 短
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_time" v-model="data.bring_communicate_time" :value="'2'" required="true"><span></span> 没有
            </label>
        </div>
        <h5>密切程度</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" v-model="data.bring_intimate" :value="'0'" required="true"><span></span> 很密切
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" v-model="data.bring_intimate" :value="'1'" required="true"><span></span> 密切
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" v-model="data.bring_intimate" :value="'2'" required="true"><span></span> 一般
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_intimate" v-model="data.bring_intimate" :value="'3'" required="true"><span></span> 不密切
            </label>
        </div>
        <h5>沟通方式</h5>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_method" v-model="data.bring_communicate_method" :value="'0'" required="true"><span></span> 鼓励肯定多
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="radio" name="bring_communicate_method" v-model="data.bring_communicate_method" :value="'1'" required="true"><span></span> 批评否定多
            </label>
        </div>
        <div class="answer">
          <div class="input-box input-box-max">
            <label>父母夫妻关系如何</label>
            <div class="input-text">
              <input type="text" name="bring_relation" v-model="data.bring_relation" required="true" placeholder="很好、好、还不错、不好">
            </div>
          </div>
        </div>
      </div>

      <h3>四、语言现状（多选）</h3>
      <div class="answer-wrap">
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[0]" v-model="data.lange" :value="'0'"><span></span> 口吃
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[1]" v-model="data.lange" :value="'1'"><span></span> 发音不清
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[2]" v-model="data.lange" :value="'2'"><span></span> 自言自语
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[3]" v-model="data.lange" :value="'3'"><span></span> 固定音调
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[4]" v-model="data.lange" :value="'4'"><span></span> 鹦鹉学舌
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[5]" v-model="data.lange" :value="'5'"><span></span> 发音困难
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[6]" v-model="data.lange" :value="'6'"><span></span> 说话声小
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[7]" v-model="data.lange" :value="'7'"><span></span> 不爱讲话
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="lange[8]" v-model="data.lange" :value="'8'"><span></span> 其他
            </label>
        </div>
      </div>

      <h3>五、行为表现（多选）</h3>
      <div class="answer-wrap">
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="behavior[0]" v-model="data.behavior" :value="'0'"><span></span> 小动作多（吸手指、摸生殖器等）
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="behavior[1]" v-model="data.behavior" :value="'1'"><span></span> 注意力不集中，东张西望
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="behavior[2]" v-model="data.behavior" :value="'2'"><span></span> 攻击他人
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="behavior[3]" v-model="data.behavior" :value="'3'"><span></span> 自伤行为
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="behavior[4]" v-model="data.behavior" :value="'4'"><span></span> 多动
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="behavior[5]" v-model="data.behavior" :value="'5'"><span></span> 刻板行为
            </label>
        </div>
      </div>

      <h3>六、情绪反应（多选）</h3>
      <div class="answer-wrap">
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="emotion[0]" v-model="data.emotion" :value="'0'"><span></span> 爱生气
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="emotion[1]" v-model="data.emotion" :value="'1'"><span></span> 常哭、闹、笑
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="emotion[2]" v-model="data.emotion" :value="'2'"><span></span> 极端恐惧（怕声音、怕黑）
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="emotion[3]" v-model="data.emotion" :value="'3'"><span></span> 摔东西、扔东西
            </label>
        </div>
        <div class="answer">
            <label class="check-box">
              <input type="checkbox" name="emotion[4]" v-model="data.emotion" :value="'4'"><span></span> 不满足时常发脾气
            </label>
        </div>
      </div>

      <h3>七、请家长详细描述儿童目前的问题和困难以及家长的困扰。</h3>
      <div class="answer-wrap">
        <div class="answer">
          <div class="textarea-box">
            <textarea name="puzzled" v-model="data.puzzled" rows="5"></textarea>
          </div>
        </div>
      </div>
      <h3>八、请家长按动作要求发送孩子视频</h3>
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
        props: {
          data: {
            type: Object,
            default: {
              'name': '',
              'sex': '',
              'birthday': '',
              'guardian_name': '',
              'age': null,
              'relation': '',
              'profession': '',
              'address': '',
              'mobile': '',
              'pregnancy': '',
              'pregnancy_activity': '',
              'father_age': null,
              'mother_age': null,
              'feed': '',
              'feed_self': '',
              'feed_old': '',
              'sports': '',
              'sports_time': '',
              'sports_car': '',
              'safe_person': '',
              'safe_mother': '',
              'safe_things': '',
              'safe_bite': '',
              'bring_father_method': '',
              'bring_mother_method': '',
              'bring_communicate_time': '',
              'bring_intimate': '',
              'bring_communicate_method': '',
              'bring_relation': '',
              'lange': [],
              'behavior': [],
              'emotion': [],
              'puzzled': ''
            }
          }
        },
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
