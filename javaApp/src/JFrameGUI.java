import java.awt.event.ActionEvent;
import java.awt.event.ActionListener;
import java.awt.FlowLayout;
import javax.swing.*;

public class JFrameGUI extends JFrame{

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
        JLabel usernameLabel = new JLabel("Username");
        JLabel passwordLabel = new JLabel("Password");
        getContentPane().setLayout(new FlowLayout());
        username = new JTextField("", 20);
        password = new JTextField("", 20);

        panel.add(usernameLabel);
        panel.add(passwordLabel);
        getContentPane().add(username);
        getContentPane().add(password);
        panel.add(button);
        add(panel);

        setVisible(true);

        button.addActionListener(new ActionListener() {
            @Override
            public void actionPerformed(ActionEvent arg0) {
                System.out.println("Login");
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
