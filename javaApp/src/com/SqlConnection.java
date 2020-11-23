package com;

import java.sql.*;

public class SqlConnection {

    private java.sql.Connection connection;
    private ResultSet result = null;
    private java.sql.ResultSetMetaData rsMetaData = null;
    private int columnCount = 0;
    private String[] columnNames;

    public SqlConnection(String url) {
        try {
            Class.forName("com.mysql.jdbc.Driver").getDeclaredConstructor().newInstance();
            connection = java.sql.DriverManager.getConnection("jdbc:mysql://" + url + "?useUnicode=true&useFastDateParsing=false&characterEncoding=UTF-8&zeroDateTimeBehavior=convertToNull");
        } catch (Exception e) {
            System.out.println(e.getMessage());
        }
    }

    public ResultSet req(String statement) {
        try {
            java.sql.Statement request = connection.createStatement();
            result = request.executeQuery(statement);
            rsMetaData = result.getMetaData();
            columnCount = rsMetaData.getColumnCount();
            columnNames = new String[columnCount];
            for (int i = 0; i < columnCount; i++) {
                columnNames[i] = rsMetaData.getColumnName(i + 1);
            }
        } catch (SQLException e) {
            System.out.println(e.getMessage());
        }
        return result;
    }

    public String[] getColumnNames() {
        return columnNames;
    }

    public int getColumnCount() {
        return columnCount;
    }

}
