using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CamaraController : MonoBehaviour
{
    private Transform trans;
    public GameObject personaje;
    public Vector2 minCamPos, maxCamPos;
    void Start()
    {
        trans = GetComponent<Transform>();
    }
    
    void FixedUpdate()
    {
        float posX = personaje.transform.position.x;
        float posY = personaje.transform.position.y;
        trans.position = new Vector3(
            Mathf.Clamp(posX, minCamPos.x, maxCamPos.x),
            Mathf.Clamp(posY, minCamPos.y, maxCamPos.y),
            trans.position.z);
    }
}
