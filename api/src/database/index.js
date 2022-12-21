// get the client
const mysql = require('mysql2/promise');
const Query = require('mysql2').query;

// Create the connection pool. The pool-specific settings are the defaults
const pool = mysql.createPool({
  host: 'localhost',
  user: 'root',
  database: 'pos-system',
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0
});
/**
 * 
 * @param {string} sql 
 * @param {any[]} param 
 * @returns {null | Promise<Query>}
 */

async function query(sql, param =[]){
    let result = null;
    try{
    result = await pool.query(sql, param);
}catch (e){
    console.error(e);
}
return result;
}

module.exports = {
    pool,
    query
}