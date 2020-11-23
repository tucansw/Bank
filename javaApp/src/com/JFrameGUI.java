package com;

import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.FlowLayout;
import javax.swing.*;

import com.GUI.*;

public class JFrameGUI extends JFrame {

    JPanel panel;
    JButton button;
    JLabel usernameLabel, passwordLabel;
    JTextField username, password;

    public JFrameGUI() {
        super("Bank");
        setLookAndFeel();
        setSize(1440, 810);
        setDefaultCloseOperation(JFrameGUI.EXIT_ON_CLOSE);
        setLocation(200, 200);
        setLocationRelativeTo(null);
        setResizable(false);
        getContentPane().setLayout(new FlowLayout());
        
        add(Login.panel());
        getRootPane().setDefaultButton(Login.btLogin);
        setVisible(true);

        Login.btLogin.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent arg0) {
                if(User.login(Login.tfUsername.getText(), Login.tfPassword.getText()) > 0) {
                    getContentPane().removeAll();
                    getContentPane().add(Home.panel());
                    revalidate();
                    repaint();
                } else {
                    Login.loginFail();
                }
            }
        });
        Login.btCreateAccount.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent arg0) {
                getContentPane().removeAll();
                getContentPane().add(CreateAccount.panel());
                revalidate();
                repaint();
            }
        });
    }
    
    private void setLookAndFeel() {
        try {
            UIManager.setLookAndFeel("com.sun.java.swing.plaf.windows.WindowsLookAndFeel");
        } catch (Exception e) {

        }
    }

}
