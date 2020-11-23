package com.GUI;

import javax.swing.*;
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import java.awt.Insets;
import java.awt.Color;

public class Login {

    public static JPanel pnPanel0;
    public static JButton btLogin;
    public static JLabel lbUsername;
    public static JLabel lbPassword;
    public static JTextField tfUsername;
    public static JTextField tfPassword;
    public static JButton btCreateAccount;
    public static JLabel lbMessage;
    
    public static JPanel panel() {
        pnPanel0 = new JPanel();
        GridBagLayout gbPanel0 = new GridBagLayout();
        GridBagConstraints gbcPanel0 = new GridBagConstraints();
        pnPanel0.setLayout( gbPanel0 );

        btLogin = new JButton( "Login"  );
        gbcPanel0.gridx = 11;
        gbcPanel0.gridy = 8;
        gbcPanel0.gridwidth = 6;
        gbcPanel0.gridheight = 2;
        gbcPanel0.fill = GridBagConstraints.BOTH;
        gbcPanel0.weightx = 1;
        gbcPanel0.weighty = 0;
        gbcPanel0.anchor = GridBagConstraints.NORTH;
        gbPanel0.setConstraints( btLogin, gbcPanel0 );
        pnPanel0.add( btLogin );

        lbUsername = new JLabel( "Username"  );
        gbcPanel0.gridx = 1;
        gbcPanel0.gridy = 2;
        gbcPanel0.gridwidth = 6;
        gbcPanel0.gridheight = 2;
        gbcPanel0.fill = GridBagConstraints.BOTH;
        gbcPanel0.weightx = 1;
        gbcPanel0.weighty = 1;
        gbcPanel0.anchor = GridBagConstraints.NORTH;
        gbcPanel0.insets = new Insets( 0,8,0,0 );
        gbPanel0.setConstraints( lbUsername, gbcPanel0 );
        pnPanel0.add( lbUsername );

        lbPassword = new JLabel( "Password"  );
        gbcPanel0.gridx = 1;
        gbcPanel0.gridy = 5;
        gbcPanel0.gridwidth = 6;
        gbcPanel0.gridheight = 2;
        gbcPanel0.fill = GridBagConstraints.BOTH;
        gbcPanel0.weightx = 1;
        gbcPanel0.weighty = 1;
        gbcPanel0.anchor = GridBagConstraints.NORTH;
        gbcPanel0.insets = new Insets( 0,8,0,0 );
        gbPanel0.setConstraints( lbPassword, gbcPanel0 );
        pnPanel0.add( lbPassword );

        tfUsername = new JTextField( );
        gbcPanel0.gridx = 9;
        gbcPanel0.gridy = 2;
        gbcPanel0.gridwidth = 9;
        gbcPanel0.gridheight = 2;
        gbcPanel0.fill = GridBagConstraints.BOTH;
        gbcPanel0.weightx = 1;
        gbcPanel0.weighty = 0;
        gbcPanel0.anchor = GridBagConstraints.NORTH;
        gbPanel0.setConstraints( tfUsername, gbcPanel0 );
        pnPanel0.add( tfUsername );

        tfPassword = new JTextField( );
        gbcPanel0.gridx = 9;
        gbcPanel0.gridy = 5;
        gbcPanel0.gridwidth = 9;
        gbcPanel0.gridheight = 2;
        gbcPanel0.fill = GridBagConstraints.BOTH;
        gbcPanel0.weightx = 1;
        gbcPanel0.weighty = 0;
        gbcPanel0.anchor = GridBagConstraints.NORTH;
        gbPanel0.setConstraints( tfPassword, gbcPanel0 );
        pnPanel0.add( tfPassword );

        btCreateAccount = new JButton( "Create an account"  );
        gbcPanel0.gridx = 11;
        gbcPanel0.gridy = 11;
        gbcPanel0.gridwidth = 6;
        gbcPanel0.gridheight = 2;
        gbcPanel0.fill = GridBagConstraints.BOTH;
        gbcPanel0.weightx = 1;
        gbcPanel0.weighty = 0;
        gbcPanel0.anchor = GridBagConstraints.NORTH;
        gbPanel0.setConstraints( btCreateAccount, gbcPanel0 );
        pnPanel0.add( btCreateAccount );

        lbMessage = new JLabel( ""  );
        JScrollPane scpMessage = new JScrollPane( lbMessage );
        gbcPanel0.gridx = 1;
        gbcPanel0.gridy = 16;
        gbcPanel0.gridwidth = 18;
        gbcPanel0.gridheight = 3;
        gbcPanel0.fill = GridBagConstraints.BOTH;
        gbcPanel0.weightx = 1;
        gbcPanel0.weighty = 1;
        gbcPanel0.anchor = GridBagConstraints.NORTH;
        gbPanel0.setConstraints( scpMessage, gbcPanel0 );
        pnPanel0.add( scpMessage );

        return pnPanel0;
    }

    public static void loginFail() {
        Login.lbMessage.setText("<html>The username you’ve entered<br/>doesn’t match any account</html>");
        Login.btLogin.setBorder(BorderFactory.createLineBorder(Color.red, 2));
    }

}
