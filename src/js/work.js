const crypto = require('crypto')
const request = require('request')
class Answer{
    constructor(callback){
        this.canvas = document.createElement('canvas');
        this.ctx = this.canvas.getContext('2d');
        this.callback = callback;
        this.host = 'http://localhost/my/php/action.php';
        this.canvas.width = 100;
        this.canvas.height = 100;
    }
    answer(path){
        this.load_img(path);
    }
    load_img(path){
        var _this =this;
        var img = new Image(path);
        img.onload = function () {
            _this.img_to_md5(img);
        }
        img.src = path;
    }
    // 将图片信息转成md5方便与数据库比对
    img_to_md5(img){
        var _this = this;
        this.ctx.clearRect(0,0,100,100);
        this.ctx.drawImage(img,0,0,100,100,0,0,100,100);
        var img_data = this.ctx.getImageData(0,0,100,100).data.toString();
        var encode = _this.create_md5(img_data);
        this.search_answer(encode);
        // this.upload_img(encode);
    }
    create_md5(str){
        const md5 = crypto.createHash('md5');
        var encode = md5.update(str).digest("base64");
        return encode;
    }
    upload_img(name){
        var _this = this;
        // 将生成的图片base64头部去掉，php后才存储图片时不需要该头部
        var upload_img_data = this.canvas.toDataURL("image/jpeg", 0.8).replace('data:image/jpeg;base64,','');
        var upload_body = {
            action: 'upload_img',
            img_name: name,
            img_data: upload_img_data
        }
        request.post({url: _this.host,formData: upload_body},(err,res)=>{
            if(!err&&res.statusCode==200){
                _this.callback(null);
            }
        })
    }
    search_answer(md5){
        var _this = this;
        var search = {
            action: 'search_answer',
            md5: md5
        };
        request.post({url: _this.host,formData: search},(err,res)=>{
            if(res.statusCode==200&&res.body!=""){
                _this.callback(JSON.parse(res.body).answer);
            }else{
                _this.upload_img(md5);
            }
        })
    }
}

module.exports = Answer;