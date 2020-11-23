import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.event.KeyEvent;
import java.awt.FlowLayout;
import javax.swing.*;
import java.sql.*;
import java.awt.GridBagConstraints;
import java.awt.GridBagLayout;
import java.awt.Insets;

public class JFrameGUI extends JFrame {

    JPanel panel;
    JButton button;
    JLabel usernameLabel, passwordLabel;
    JTextField username, password;

    public JFrameGUI() {
        super("Bank");
        setLookAndFeel();
        setSize(600, 400);
        setDefaultCloseOperation(JFrame.EXIT_ON_CLOSE);
        setLocation(200, 200);
        setLocationRelativeTo(null);
        setResizable(false);

        getContentPane().setLayout(new FlowLayout());
        
        JPanel pnPanel0;
        JButton btLogin;
        JLabel lbUsername;
        JLabel lbPassword;
        JTextField tfUsername;
        JTextField tfPassword;
        JButton btCreateAccount;
        JLabel lbMessage;

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

        btCreateAccount = new JButton( "Create account"  );
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

        getRootPane().setDefaultButton(btLogin);

        setVisible(true);

        btLogin.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent arg0) {
                String username = tfUsername.getText();
                String password = tfPassword.getText();
                String hashedPassword = "";
                int accID = -2;
                int nameID = -1;
                int pwID = -3;
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
                if(pwID == nameID) {
                    accID = pwID;
                    System.out.println("Successfully logged in with account ID: " + accID);
                    lbMessage.setText("Successfully logged in, " + username + "!");
                } else {
                    System.out.println("Account with given username and password not found!");
                    lbMessage.setText("The username you’ve entered doesn’t match any account");
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
