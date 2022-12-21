var req = require('express').request;
var res = require('express').response;
const db = require("../database/index");
/*
 * 
 * 
 * 
 * @param {Request} req 
 * @param {Response} res 
 */
async function checksalehandlers(req, res) {
    let user_id = req.body.user_id;
        let sql = "SELECT DATE_FORMAT(DATE, '%M-%Y') AS DATE,SUM(price) AS total,SUM(amount) AS amount FROM sale_amount GROUP BY DATE_FORMAT(DATE,'%M-%Y') ORDER BY DATE_FORMAT(DATE,'%M-%Y') DESC";
        let result = await db.query(sql);
        console.log(result)
        let response = {
            code: 200,
            message: "สำเร็จ",
            data: result[0]
        };
        res.json(response);
        res.end();
        return;
}
async function lchecksalehandlers(req, res) {
    let user_id = req.body.user_id;
        let sql = "SELECT DATE_FORMAT(DATE, '%M-%Y') AS DATE,product_type AS pdt,product_brand AS pdb,product_name AS NAME,amount AS amount, price AS price FROM sale_amount";
        let result = await db.query(sql);
        console.log(result)
        let response = {
            code: 200,
            message: "สำเร็จ",
            data: result[0]
        };
        res.json(response);
        res.end();
        return;
}




async function statsalehandlers(req, res) {
    let tdata = req.body.tdata;
    if (tdata){
    
    if(tdata == "ประเภทสินค้า"){
        let sql = "SELECT DATE_FORMAT(DATE, '%M-%Y') AS DATE,product_type AS TYPE, SUM(price) AS total FROM sale_amount GROUP BY product_type ORDER BY DATE_FORMAT(DATE,'%M-%Y') DESC";
        let result = await db.query(sql);
        let response = {
            code: 200,
            message: "สำเร็จ",
            data: result[0]
        };
        res.json(response);
        res.end();
        return;
    }
    if(tdata == "แบรนสินค้า"){
        let sql = "SELECT DATE_FORMAT(DATE, '%M-%Y') AS DATE,product_brand AS TYPE, SUM(price) AS total FROM sale_amount GROUP BY product_brand ORDER BY DATE_FORMAT(DATE,'%M-%Y') DESC";
        let result = await db.query(sql);
        let response = {
            code: 200,
            message: "สำเร็จ",
            data: result[0]
        };
        res.json(response);
        res.end();
        return;
    }
}else{
    let response = {
    code: 400,
    message: "invalid parameter",

};
res.json(response);
res.end();
return;

}

}





module.exports = {
    checksalehandlers,
    statsalehandlers,
    lchecksalehandlers
 
    
}