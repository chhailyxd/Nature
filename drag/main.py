import tkinter as tk
from tkinter import filedialog
from PIL import Image, ImageTk # type: ignore

class DragDropBuilder:
    def __init__(self, master):
        self.master = master
        self.master.title("Drag and Drop Page Builder")

        # Create canvas
        self.canvas = tk.Canvas(self.master, bg="white", width=600, height=400)
        self.canvas.pack(fill=tk.BOTH, expand=True)

        # Register drag-and-drop events
        self.canvas.bind("<ButtonPress-1>", self.on_press)
        self.canvas.bind("<B1-Motion>", self.on_drag)

        # Create element toolbar
        self.toolbar = tk.Frame(self.master)
        self.toolbar.pack(side=tk.LEFT, fill=tk.Y)

        # Add elements to toolbar
        self.add_button("Text")
        self.add_button("Image")
        self.add_button("Media")

        # Initialize variables
        self.drag_data = {"item": None, "x": 0, "y": 0}

    def add_button(self, text):
        button = tk.Button(self.toolbar, text=text, command=lambda: self.add_element(text))
        button.pack(fill=tk.X)

    def add_element(self, element_type):
        if element_type == "Text":
            self.canvas.create_text(100, 100, text="Sample Text", fill="black")
        elif element_type == "Image":
            filename = filedialog.askopenfilename(title="Select Image File", filetypes=(("Image files", "*.jpg;*.jpeg;*.png;*.gif"), ("All files", "*.*")))
            if filename:
                image = Image.open(filename)
                photo_image = ImageTk.PhotoImage(image)
                self.canvas.create_image(100, 100, image=photo_image, anchor=tk.NW)
                self.canvas.image = photo_image  # Keep a reference to prevent garbage collection
        elif element_type == "Media":
            filename = filedialog.askopenfilename(title="Select Media File", filetypes=(("Media files", "*.mp4;*.avi;*.mkv;*.mp3;*.wav"), ("All files", "*.*")))
            if filename:
                media_type = filename.split(".")[-1]
                if media_type in ["mp4", "avi", "mkv"]:
                    # Display video
                    self.canvas.create_rectangle(100, 100, 300, 200, fill="black")  # Placeholder for video
                elif media_type in ["mp3", "wav"]:
                    # Display audio
                    self.canvas.create_text(100, 100, text="Audio file: " + filename, fill="black")

    def on_press(self, event):
        self.drag_data["item"] = self.canvas.find_closest(event.x, event.y)[0]
        self.drag_data["x"] = event.x
        self.drag_data["y"] = event.y

    def on_drag(self, event):
        delta_x = event.x - self.drag_data["x"]
        delta_y = event.y - self.drag_data["y"]
        self.canvas.move(self.drag_data["item"], delta_x, delta_y)
        self.drag_data["x"] = event.x
        self.drag_data["y"] = event.y

def main():
    root = tk.Tk()
    app = DragDropBuilder(root)
    root.mainloop()

if __name__ == "__main__":
    main()
