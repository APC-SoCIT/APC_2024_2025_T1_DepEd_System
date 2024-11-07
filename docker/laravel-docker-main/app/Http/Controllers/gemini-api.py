# app.py
from flask import Flask, request, jsonify
import os
import google.generativeai as genai
from PIL import Image
import io

app = Flask(__name__)
genai.configure(api_key="AIzaSyDjlcl5JEakdnC2ER_Onc3yCiOXlJ_SSEg")

@app.route('/analyze', methods=['POST'])
def analyze_image():
    file = request.files['file']
    image = Image.open(file.stream)
    
    # Create the model and generate content
    generation_config = {
        "temperature": 1,
        "top_p": 0.95,
        "top_k": 64,
        "max_output_tokens": 8192,
        "response_mime_type": "text/plain",
    }

    model = genai.GenerativeModel("gemini-1.5-flash", generation_config=generation_config)
    response = model.generate_content(
        ["Specifically extract the grades in this format:"
         "['mother tounge Quarter 1', 'mother tounge Quarter 2', 'mother tounge Quarter 3', 'mother tounge Quarter 4']"
         "['filipino Quarter 1', 'filipino Quarter 2', 'filipino Quarter 3', 'filipino Quarter 4']"
         "['english Quarter 1', 'english Quarter 2', 'english Quarter 3', 'english Quarter 4']"
         "['math Quarter 1', 'math Quarter 2', 'math Quarter 3', 'math Quarter 4']"
         "['araling panlipunan Quarter 1', 'araling panlipunan Quarter 2', 'araling panlipunan Quarter 3', 'araling panlipunan Quarter 4']"
         "['edukasyon sa pagpapakatao Quarter 1', 'edukasyon sa pagpapakatao Quarter 2', 'edukasyon sa pagpapakatao Quarter 3', 'edukasyon sa pagpapakatao Quarter 4']"
         "['mapeh Quarter 1', 'mapeh Quarter 2', 'mapeh Quarter 3', 'mapeh Quarter 4']"
         "['music Quarter 1', 'music Quarter 2', 'music Quarter 3', 'music Quarter 4']"
         "['arts Quarter 1', 'arts Quarter 2', 'arts Quarter 3', 'artsmusic Quarter 4']"
         "['pe Quarter 1', 'pe Quarter 2', 'pe Quarter 3', 'pe Quarter 4']"
         "['health Quarter 1', 'health Quarter 2', 'health Quarter 3', 'health Quarter 4']"
         "Notes: The output must be an array of array. If a grade is missing, the input would be '' or empty index."

         , image])

    return jsonify({'text': response.text})

if __name__ == '__main__':
    app.run(port=5000)  # Run on port 5000