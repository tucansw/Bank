package com;

public class App {

    public static SqlConnection sqlc;
    public static void main(String[] args) throws Exception {
        sqlc = new SqlConnection("localhost/Bank");
        JFrameGUI gui = new JFrameGUI();
    }

}