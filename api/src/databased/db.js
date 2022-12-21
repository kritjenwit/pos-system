// get the client
const mysql = require("mysql2/promise");
const Query = require("mysql2/promise").query;

// Create the connection pool. The pool-specific settings are the defaults
const pool = mysql.createPool({
  host: "localhost",
  user: "root",
  //username: 'admin',
  database: "pos-system",
  waitForConnections: true,
  connectionLimit: 10,
  queueLimit: 0,
});
/**
 * To Execute Query
 * eg. Insert | Update | Delete | Select
 *
 * @param {string} sql MySQL Query
 * @param {any[]} param
 * @return {null | Promise<Query>}
 */
async function query(sql, param = []) {
  let result = null;
  try {
    result = await pool.query(sql, param);
  } catch (e) {
    console.error(e);
  }
  return result;
}
// export variable or function in this page.
module.exports = {
  pool,
  query,
};
