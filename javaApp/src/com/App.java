package com;

import com.ui.MainFrame;
import javax.swing.SwingUtilities;

public class App {

    public static SqlConnection sqlc;
    public static void main(String[] args) throws Exception {
        sqlc = new SqlConnection("localhost/Bank");
        
        // Launch the new UI prototype parallel to the old one
        SwingUtilities.invokeLater(() -> {
            final MainFrame mainFrame = new MainFrame();
            mainFrame.pack();
            mainFrame.setSize(800, 600);
            mainFrame.setLocationRelativeTo(null);  // Center on screen
            mainFrame.setVisible(true);
        });
    }

}
