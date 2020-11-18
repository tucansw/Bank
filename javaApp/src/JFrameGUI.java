import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.FlowLayout;
import javax.swing.*;
import java.sql.*;

public class JFrameGUI extends JFrame {

    JPanel panel;
    JButton button;
    JLabel usernameLabel, passwordLabel;
    JTextField username, password;

    public JFrameGUI() {
        super("Bank System");
        setLookAndFeel();
        setSize(600, 400);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocation(200, 200);
        setLocationRelativeTo(null);
        setResizable(false);

        JPanel panel = new JPanel();
        JButton button = new JButton("Login");
        JLabel text = new JLabel("");
        getContentPane().setLayout(new FlowLayout());
        username = new JTextField("", 20);
        password = new JTextField("", 20);

        panel.add(text);
        getContentPane().add(username);
        getContentPane().add(password);
        panel.add(button);
        add(panel);

        setVisible(true);

        button.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent arg0) {
                String usernameVal = username.getText();
                String passwordVal = password.getText();
                String hashedPassword = "";
                int accID = -2;
                int nameID = -1;
                int pwID = -3;
                System.out.println("Logging in with username: \"" + usernameVal + "\" and password: \"" + passwordVal + "\" ...");
                ResultSet res;
                res = App.sqlc.req("SELECT accID as res FROM accounts WHERE accName = \"" + usernameVal + "\"");
                try {
                    if (res.next()) {
                        nameID = Integer.valueOf(res.getString("res"));
                    }
                } catch (SQLException e) {
                    e.printStackTrace();
                }
                res = App.sqlc.req("SELECT md5(\"" + passwordVal + "\") as res");
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
                if(pwID == nameID) {
                    accID = pwID;
                    System.out.println("Successfully logged in with account ID: " + accID);
                    text.setText("Successfully logged in, " + usernameVal + "!");
                } else {
                    System.out.println("Account with given username and password not found!");
                    text.setText("The username you’ve entered doesn’t match any account");
                }
            }
        });
    }

    private void setLookAndFeel() {
        try {
            UIManager.setLookAndFeel("javax.swing.plaf.nimbus.NimbusLookAndFeel");
        } catch (Exception e) {

        }
    }

}
