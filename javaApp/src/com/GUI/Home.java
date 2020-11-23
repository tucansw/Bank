package com.GUI;

import com.User;
import javax.swing.*;

public class Home {

    public static JPanel pnPanel0;
    public static JLabel lbMessage;

    public static JPanel panel() {
        pnPanel0 = new JPanel();
        lbMessage = new JLabel("<html>We in boys!<br>Hello, " + User.getUsername() + "<br>Balance: " + User.getBalance() + " €</html>");

        pnPanel0.add(lbMessage);

        return pnPanel0;
    }

}
