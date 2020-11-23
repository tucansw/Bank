package com;

import java.sql.*;

public class User {

    private static String username;
    private static String hashedPw;
    private static int accID;

    public static int login(String username, String password) {
        String hashedPassword = "";
        int nameID = 0;
        int pwID = 0;
        System.out.println("Logging in with username: \"" + username + "\" and password: \"" + password + "\" ...");
        ResultSet res;
        res = App.sqlc.req("SELECT accID as res FROM accounts WHERE accName = \"" + username + "\"");
        try {
            if (res.next()) {
                nameID = Integer.valueOf(res.getString("res"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        res = App.sqlc.req("SELECT md5(\"" + password + "\") as res");
        try {
            if (res.next()) {
                hashedPassword = res.getString("res");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        res = App.sqlc.req("SELECT accID as res FROM accounts WHERE accPassword = \"" + hashedPassword + "\"");
        try {
            if (res.next()) {
                pwID = Integer.valueOf(res.getString("res"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        if(nameID == pwID && nameID != 0) {
            User.username = username;
            User.hashedPw = hashedPassword;
            System.out.println("Successfully logged in with account ID: " + nameID);
            User.accID = nameID;
            return nameID;
        }
        System.out.println("Account with given username and password not found!");
        return 0;
    }

    public static float getBalance() {
        ResultSet res = App.sqlc.req("SELECT balance as res FROM accounts WHERE accID = " + accID);
        try {
            if (res.next()) {
                return Float.valueOf(res.getString("res"));
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
        return 0.0f;
    }

    public static String getUsername() {
        return username;
    }

    public static String getPassword() {
        return hashedPw;
    }
}
