import tkinter as tk
from tkinter import filedialog

def select_folder():
    folder_path = filedialog.askdirectory()
    if folder_path:
        folder_entry.delete(0, tk.END)  # Clear any existing text in the entry widget
        folder_entry.insert(0, folder_path)  # Insert the selected folder path into the entry widget

# Create a Tkinter window
root = tk.Tk()
root.title("Select Folder")

# Create a label and entry widget to display the selected folder path
folder_label = tk.Label(root, text="Selected Folder:")
folder_label.pack(pady=5)

folder_entry = tk.Entry(root, width=50)
folder_entry.pack(pady=5)

# Create a button to trigger folder selection
select_button = tk.Button(root, text="Select Folder", command=select_folder)
select_button.pack(pady=5)

# Run the Tkinter event loop
root.mainloop()
